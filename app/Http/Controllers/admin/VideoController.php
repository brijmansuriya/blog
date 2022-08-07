<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\StoryAndGame;
use App\Models\Subcategory;
use App\Models\Courses;
use App\Models\Video;
use App\Models\Category;
use Validator;
class VideoController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_admin');
        $this->data['menu_title'] = "Story And Game";
    } 

    public function index(Request $request)
    {

        $this->data['courses'] = Courses::get(['id','name']);

        if ($request->ajax()) {

            
            $data = Video::orderBy('created_at', 'DESC')->get();
            $datat =  DataTables::of($data);

            if ($request->has('courses_id')) {
                $datat->filter(function ($instance) use ($request) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                        if ($request->get('courses_id') == "0" AND $request->get('cid') == "0" AND $request->get('scid') == "0") {
                            return true;
                        }else if($request->get('courses_id') != "0" AND $request->get('cid') == "0" AND $request->get('scid') == "0"){
                            return $row['courses_id'] == $request->get('courses_id') ? true : false;
                        }else if($request->get('courses_id') != "0" AND $request->get('cid') != "0"  AND $request->get('scid') == "0"){
                            return $row['courses_id'] == $request->get('courses_id') AND $row['cid'] == $request->get('cid') ? true : false;
                        }
                        return $row['courses_id'] == $request->get('courses_id') AND $row['cid'] == $request->get('cid') AND $row['scid'] == $request->get('scid') ? true : false;
                    });
                });
            }

            return $datat->addIndexColumn()
                ->editColumn('courses', function ($row) {

                    return isset($row->courses->name) ? $row->courses->name : '';
                })
                ->editColumn('category', function ($row) {
                    return isset($row->category->name) ? $row->category->name : '';
                })
                ->editColumn('Subcategory', function ($row) {
                    return isset($row->subcategory->name) ? $row->subcategory->name : '' ;
                })
                ->editColumn('storyandgame', function ($row) {
                    return isset($row->storyandgame->name) ? $row->storyandgame->name : '';
                })
                ->editColumn('name', function ($row) {
                    return isset($row->title) ? $row->title : '';
                })
                ->editColumn('action', function ($row) {
                    $btn = '<a href="' . route('video.edit', $row['id']) . '" class="mr-2"><i class="fa fa-edit" style="color: #172774;"></i></a>';
                    $delete_link = route('video.destroy', $row['id']);
                    $delete_link = "'" . $delete_link . "'";
                    $btn .= '<a href="javascript:void(0);" onclick="deleteRecord(' . $delete_link . ');" data-popup="tooltip"><i class="fa fa-trash" style="color: #172774;"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        } else {
            $columns = [
                ['data' => 'DT_RowIndex', 'name' => 'id', 'title' => "Id"],
                ['data' => 'courses', 'name' => 'courses', 'title' => __("Courses"), 'searchable' => true],
                ['data' => 'category', 'name' => 'category', 'title' => __("Category"), 'searchable' => true],
                ['data' => 'Subcategory', 'name' => 'Subcategory', 'title' => __("Subcategory"), 'searchable' => true],
                ['data' => 'storyandgame', 'name' => 'storyandgame', 'title' => __("StoryAndGame"), 'searchable' => true],
                ['data' => 'name', 'name' => 'name', 'title' => __("Title"), 'searchable' => true],
                ['data' => 'action', 'name' => 'action', 'title' => "Action", 'searchable' => true, 'orderable' => false]];

            $this->data['dateTableFields'] = $columns;
            $this->data['dateTableUrl'] = route('video.index');
            $this->data['dateTableTitle'] = "video Management";
            $this->data['dataTableId'] = time();
            $this->data['addUrl'] = route('video.create');
            $this->data['title'] = 'Video';
            return view('admin.pages.video.index', $this->data);
        }
        return Subcategory::get();
    }

   
    public function create()
    {
        $this->data['dateTableTitle'] = "Add video";
        $this->data['courses'] = Courses::get(['id','name']);
        $this->data['backUrl'] = route('video.index');
        $this->data['title'] = 'Video';
        return view('admin.pages.video.create', $this->data);
    }

    
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|unique:storyandgame',
            'cid'=>'required|not_in:0',
            'scid'=>'required|not_in:0',
        ],[
            'cid.required' => 'Select category',
            'cid.not_in' => 'Select category',
            'scid.required' => 'Select sub category',
            'scid.not_in' => 'Select sub category',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'video_error');
        } else {
            $input = $request->all();
            $category =  Video::create($input);
            if ($category) {
                return redirect()->route('video.index')->with('success', 'created successfully.');
            }
        }
        return redirect()->route('video.index')->with('success', 'created successfully.');
    }
    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $this->data['pageTittle'] = "Edit Story And Game";
        $this->data['videodata'] = Video::find($id);

        $this->data['courses'] = Courses::get(['id','name']);

        $this->data['subcategorydata'] = Subcategory::where('cid',$this->data['videodata']->cid)->get(['id','name']);

        $this->data['categorydata'] = Category::where('courses_id',$this->data['videodata']->courses_id)->get(['id','name']);

        $this->data['gamestorydata'] = StoryAndGame::where('scid',$this->data['videodata']->scid)->get(['id','name']);
        $this->data['title'] = 'Video';
        $this->data['dateTableTitle'] = "Edit Story And Game";
        $this->data['backUrl'] = route('video.index');
        return view('admin.pages.video.edit', $this->data);
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|unique:storyandgame,name,'.$id,
            'cid'=>'required|not_in:0',
            'scid'=>'required|not_in:0',
        ],[
            'cid.required' => 'Select category',
            'cid.not_in' => 'Select category',
            'scid.required' => 'Select sub category',
            'scid.not_in' => 'Select sub category',
        ]);
      
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'video_error');
        } else {
            $input = $request->all();

            $storyandgame = Video::find($id);
            $storyandgame->update($input);
            if ($storyandgame) {
                return redirect()->route('video.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
    }

    
    public function destroy($id)
    {
        $delete = Video::find($id)->delete();
        Session::flash('success', 'Deleted successfully');
        return $delete;
    }
    public function subdropdown($id)
    {
        $subdropdown = Subcategory::where('cid',$id)->get();
        return $subdropdown;
    }
}
