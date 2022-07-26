<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Courses;
use App\Models\StoryAndGame;
use App\Models\Subcategory;
use App\Models\CourseSub;
use App\Models\Category;
use Validator;
use App\Traits\ImageUpload;

class CoursesController extends Controller
{
    use ImageUpload;
    public function __construct()
    {
        $this->middleware('is_admin');
        $this->data['menu_title'] = "Story And Game";
    } 

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Courses::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($row) {
                    $btn = '<a href="' . route('courses.edit', $row['id']) . '" class="mr-2"><i class="fa fa-edit" style="color: #172774;"></i></a>';
                    $delete_link = route('courses.destroy', $row['id']);
                    $delete_link = "'" . $delete_link . "'";
                    $btn .= '<a href="javascript:void(0);" onclick="deleteRecord(' . $delete_link . ');" data-popup="tooltip"><i class="fa fa-trash" style="color: #172774;"></i></a>';
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
            $this->data['dateTableUrl'] = route('courses.index');
            $this->data['dateTableTitle'] = "Story And Game Management";
            $this->data['dataTableId'] = time();
            $this->data['addUrl'] = route('courses.create');
            return view('admin.pages.courses.index', $this->data);
        }
        return Subcategory::get();
    }

   
    public function create()
    {
        $this->data['dateTableTitle'] = "Add Story And Game";
       
        $this->data['backUrl'] = route('courses.index');
        return view('admin.pages.courses.create', $this->data);
    }

    
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'courses_error');
        } else {
            $input = $request->all();
            if ($request->image) {
                $name = $this->imageUpload($request->image,'courses');
                $input['image'] = $name;
            }
            $courses = Courses::create($input);

            if ($courses) {
                return redirect()->route('courses.index')->with('success', 'created successfully.');
            }
        }
        return redirect()->route('courses.index')->with('success', 'created successfully.');
    }
    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
    $this->data['pageTittle'] = "Edit Courses";
    $this->data['courses'] = Courses::first();
    $this->data['dateTableTitle'] = "Edit Courses";
    $this->data['backUrl'] = route('courses.index');
    return view('admin.pages.courses.edit', $this->data);
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|unique:courses,name,'.$id,
            // 'cid'=>'required|not_in:0',
            // 'scid'=>'required|not_in:0',
        ]);
      
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'courses_error');
        } else {
            $input = $request->all();
            if ($request->image) {
                $name = $this->imageUpload($request->image,'courses');
                $input['image'] = $name;
            }
            $storyandgame = Courses::find($id);
            $storyandgame->update($input);
            if ($storyandgame) {
                return redirect()->route('courses.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
    }

    
    public function destroy($id)
    {
        $delete = Courses::find($id)->delete();
        Session::flash('success', 'Deleted successfully');
        return $delete;
    }
    public function subdropdown($id)
    {
        $subdropdown = Subcategory::where('cid',$id)->get();
        return $subdropdown;
    }
    public function gsdropdown($id)
    {
        $subdropdown = StoryAndGame::where('scid',$id)->get();
        return $subdropdown;
    }
}
