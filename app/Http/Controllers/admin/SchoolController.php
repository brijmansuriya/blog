<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\School;
use App\Models\VideoCount;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use Yajra\DataTables\Facades\DataTables;

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
                    $btn = '';
                    if($row->id != 1){
                    $delete_link = route('school.destroy', $row['id']);
                    $delete_link = "'" . $delete_link . "'";
                    $btn .= '<a href="javascript:void(0);" class="mr-2" onclick="deleteRecord(' . $delete_link . ');" data-popup="tooltip"><i class="fa fa-trash" title="Delete" style="color: #172774;"></i></a>';
                }

                    if($row->id != 1){
                        if ($row->active == 1) {
                            $btn .= '<a href="' . route('school.active', ['id' => $row['id'], 'active' => $row['active']]) . '" class="mr-2"><i class="fa-solid fa-toggle-on" title="ON"  style="color: #172774;"></i></a>';
                        } else {
                            $btn .= '<a href="' . route('school.active', ['id' => $row['id'], 'active' => $row['active']]) . '" class="mr-2"><i class="fa-solid fa-toggle-off" title="OFF"  style="color: #172774;"></i></a>';
                        }
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
            $this->data['title'] = 'School';
            $this->data['addUrl'] = route('school.create');
            return view('admin.pages.school.index', $this->data);
        }
        return School::get();
    }

    public function create()
    {
        $this->data['courses'] = Courses::get(['id', 'name']);
        $this->data['dateTableTitle'] = "Add School";
        $this->data['backUrl'] = route('school.index');
        $this->data['title'] = 'School';
        return view('admin.pages.school.create', $this->data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'name' => 'required|unique:users',
            'courses' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'school_error')
                ->withInput();
        } else {
            $input = $request->all();

            $input['courses'] = implode(",", $request->courses);
            if ($request->image) {
                $name = $this->imageUpload($request->image, 'courses');
                $input['image'] = $name;
            }

            $input['password'] = Hash::make($request->password);
            $school = School::create($input);
            if ($school) {
                return redirect()->route('school.index')->with('success', 'School created successfully.');
            } else {
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
        $this->data['courses'] = Courses::get(['id', 'name']);
        $this->data['dateTableTitle'] = "Edit school";
        $this->data['backUrl'] = route('school.index');
        $this->data['title'] = 'School';
        return view('admin.pages.school.edit', $this->data);
    }

    public function passwordEdit($id)
    {
        $this->data['school'] = School::find($id);
        $this->data['pageTittle'] = "Edit school password";
        $this->data['dateTableTitle'] = "Edit school password";
        $this->data['backUrl'] = route('school.password');
        $this->data['title'] = 'School';
        return view('admin.pages.school.passwordedit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email,' . $id,
            'name' => 'required|unique:users,name,' . $id,
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
            $input['courses'] = implode(",", $request->courses);
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
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
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
    public function active($id = '', $active = '')
    {

        if ($active == 1) {
            $active = School::find($id);
            $active->active = 0;

            $active->save();
        } else {
            $active = School::find($id);
            $active->active = 1;

            $active->save();
        }

        return redirect()->back()->with('success', 'Successfully Updated');

    }
   
    public function count_old()
    {
        return VideoCount::with('school:id,name','course:id,name','video:id,title')->groupBy('school_id', 'course_id','video_id')->get();


    }

    public function count(Request $request)
    {

        $this->data['schooldata']  = School::odb()->get(['id','name']);

        // return VideoCount::with('school:id,name','course:id,name','video:id,title')->groupBy('school_id', 'course_id','video_id')->get();

        if ($request->ajax()) {
            $data = VideoCount::with('school:id,name','course:id,name','video:id,title')->groupBy('school_id', 'course_id','video_id')->get();
            $datat =  DataTables::of($data);
            if ($request->has('school_id')) {
                $datat->filter(function ($instance) use ($request) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                        if ($request->get('school_id') == "0" AND $request->get('courses_id') == "0") {
                            return true;
                        }else if($request->get('school_id') != "0" AND $request->get('courses_id') == "0"){
                            return $row['school_id'] == $request->get('school_id') ? true : false;
                        }else if($request->get('courses_id') != "0" AND $request->get('school_id') == "0"){
                            return $row['course_id'] == $request->get('courses_id') ? true : false;
                        }
                        return $row['school_id'] == $request->get('school_id') AND $row['course_id'] == $request->get('courses_id') ? true : false;
                    });
                });
            }


                return $datat->addIndexColumn()
                ->editColumn('school', function ($row) {
                    return (isset($row->school->name)) ? $row->school->name : '';
                })
                ->editColumn('course', function ($row) {
                    return (isset($row->course->name)) ? $row->course->name : '';
                })
                ->editColumn('video', function ($row) {
                    return (isset($row->video->title)) ? $row->video->title : '';
                })
                ->rawColumns(['school','course','video'])
                ->make(true);

        } else {
            $columns = [
                ['data' => 'DT_RowIndex', 'name' => 'id', 'title' => "Id"],
                ['data' => 'school', 'name' => 'school', 'title' => __("School")],
                ['data' => 'course', 'name' => 'course', 'title' => __("Course"), 'searchable' => true],
                ['data' => 'video', 'name' => 'video', 'title' => __("Video"), 'searchable' => true],
                ['data' => 'count', 'name' => 'count', 'title' => __("Count")]];

            $this->data['dateTableFields'] = $columns;
            $this->data['dateTableUrl'] ='';
            $this->data['dateTableTitle'] = "Video count";
            $this->data['dataTableId'] = time();
            $this->data['title'] = 'Video Count';
            return view('admin.pages.count.index', $this->data);
        }
        return School::get();
    }
    
}
