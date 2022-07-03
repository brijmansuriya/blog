<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Traits\ImageUpload;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SchoolController extends Controller
{
    use ImageUpload;
    public function __construct()
    {
        $this->middleware('is_admin');
        $this->data['menu_title'] = "School";
    } 

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = School::odb()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($row) {
                    $delete_link = route('school.destroy', $row['id']);
                    $delete_link = "'" . $delete_link . "'";
                    $btn = '<a href="javascript:void(0);" class="mr-2" onclick="deleteRecord(' . $delete_link . ');" data-popup="tooltip"><i class="fa fa-trash" style="color: #172774;"></i></a>';
                    if($row->active==1){
                        $btn .= '<a href="' . route('school.active',['id'=>$row['id'],'active'=>$row['active']]) . '" class="mr-2"><i class="fa-solid fa-toggle-on"  style="color: #172774;"></i></a>';
                    }else{
                        $btn .= '<a href="' . route('school.active',['id'=>$row['id'],'active'=>$row['active']]) . '" class="mr-2"><i class="fa-solid fa-toggle-off"  style="color: #172774;"></i></a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        } else {
            $columns = [
                ['data' => 'DT_RowIndex', 'name' => 'id', 'title' => "Id"],
                ['data' => 'name', 'name' => 'name', 'title' => __("Name"), 'searchable' => true],
                ['data' => 'action', 'name' => 'action', 'title' => "Action", 'searchable' => true, 'orderable' => false]];

            $this->data['dateTableFields'] = $columns;
            $this->data['dateTableUrl'] = route('school.index');
            $this->data['dateTableTitle'] = "School Management";
            $this->data['dataTableId'] = time();
            $this->data['addUrl'] = route('school.create');
            return view('admin.pages.school.index', $this->data);
        }
        return School::get();
    }

   
    public function create()
    {
        $this->data['dateTableTitle'] = "Add School";
        $this->data['backUrl'] = route('school.index');
        return view('admin.pages.school.create', $this->data);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'name' => 'required|unique:users',
            'password'  =>  'required|min:8',
            'confirm_password'  =>  'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'school_error')
                ->withInput();
        } else {
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
            $school = School::create($input);
            if ($school) {
                return redirect()->route('school.index')->with('success', 'School created successfully.');
            }else{
                return redirect()->back();
            }
        }
       
    }
    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $this->data['pageTittle'] = "Edit school";
        $this->data['school'] = School::find($id);
        $this->data['dateTableTitle'] = "Edit school";
        $this->data['backUrl'] = route('school.index');
        return view('admin.pages.school.edit', $this->data);
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email,'.$id,
            'name' => 'required|unique:users,name,'.$id,
            'password'  =>  'required|min:8',
            'confirm_password'  =>  'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'school_error')
                ->withInput();
        } else {
            $input = $request->all();
            $input['updated_at'] = date('Y-m-d H:i:s');
            $school = School::find($id);
            // if ($request->image) {
            //     $name = $this->imageUpload($request->image, 'school');
            //     $input['image'] = $name;
            // }
            // $input['slug'] = Str::slug($input['name']);
            $school->update($input);
            if ($school) {
                return redirect()->route('school.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
    }

    
    public function destroy($id)
    {
        $delete = School::find($id)->delete();
        Session::flash('success', 'Deleted successfully');
        return $delete;
    }
    public function active($id='',$active='')
    {
    
      if($active==1){
             $active = School::find($id);
             $active->active = 0;
            
             $active->save();
        }else{
            $active = School::find($id);
            $active->active = 1;
         
             $active->save();
        }
    
        return redirect()->back()->with('success', 'Successfully Updated');
       
    }
}
