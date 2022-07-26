<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Courses;
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
                    $btn = '<a href="javascript:void(0);" class="mr-2" onclick="deleteRecord(' . $delete_link . ');" data-popup="tooltip"><i class="fa fa-trash" title="Delete" style="color: #172774;"></i></a>';
                    if($row->active==1){
                        $btn .= '<a href="' . route('school.active',['id'=>$row['id'],'active'=>$row['active']]) . '" class="mr-2"><i class="fa-solid fa-toggle-on" title="ON"  style="color: #172774;"></i></a>';
                    }else{
                        $btn .= '<a href="' . route('school.active',['id'=>$row['id'],'active'=>$row['active']]) . '" class="mr-2"><i class="fa-solid fa-toggle-off" title="OFF"  style="color: #172774;"></i></a>';
                    }
                    $btn .= '<a href="' . route('school.edit', $row['id']) . '" class="mr-2"><i class="fa fa-edit" style="color: #172774;" title="Edit"></i></a>';

                    $btn .= '<a href="' . route('school.password', $row['id']) . '" class="mr-2"><i class="fa fa-key" style="color: #172774;" title="Password Update"></i></a>';
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
        $this->data['courses'] = Courses::get(['id','name']);
        $this->data['dateTableTitle'] = "Add School";
        $this->data['backUrl'] = route('school.index');
        return view('admin.pages.school.create', $this->data);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'name' => 'required|unique:users',
            'courses' => 'required',
            'password'  =>  'required|min:8',
            'confirm_password'  =>  'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'school_error')
                ->withInput();
        } else {
            $input = $request->all();
        
            $input['courses'] = implode(",",$request->courses);
            if ($request->image) {
                $name = $this->imageUpload($request->image, 'courses');
                $input['image'] = $name;
            }
            
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
        $this->data['courses'] = Courses::get(['id','name']);
        $this->data['dateTableTitle'] = "Edit school";
        $this->data['backUrl'] = route('school.index');
        return view('admin.pages.school.edit', $this->data);
    }

    public function passwordEdit($id)
    {
        $this->data['school'] = School::find($id);
        $this->data['pageTittle'] = "Edit school password";
        $this->data['dateTableTitle'] = "Edit school password";
        $this->data['backUrl'] = route('school.password');
        return view('admin.pages.school.passwordedit', $this->data);
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email,'.$id,
            'name' => 'required|unique:users,name,'.$id,
            // 'courses' => 'required',
            // 'password'  =>  'required|min:8',
            // 'confirm_password'  =>  'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'school_error')
                ->withInput();
        } else {
            $input = $request->all();
            // $input['courses_id'] = explode(",",$input->courses_id);
            
            $input['updated_at'] = date('Y-m-d H:i:s');
            $input['courses'] = implode(",",$request->courses);
            if ($request->image) {
                $name = $this->imageUpload($request->image, 'courses');
                $input['image'] = $name;
            }
            $school = School::find($id);
            $school->update($input);
            if ($school) {
                return redirect()->route('school.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
    }

    public function passwordUpdate(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
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
            $input['password'] = Hash::make($request->password);
            $school = School::find($id);
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
