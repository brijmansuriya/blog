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
use App\Models\Category;
use Validator;
class StoryAndGameController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_admin');
        $this->data['menu_title'] = "Story And Game";
    } 

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = StoryAndGame::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($row) {
                    $btn = '<a href="' . route('storyandgame.edit', $row['id']) . '" class="mr-2"><i class="fa fa-edit" style="color: #172774;"></i></a>';
                    $delete_link = route('storyandgame.destroy', $row['id']);
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
            $this->data['dateTableUrl'] = route('storyandgame.index');
            $this->data['dateTableTitle'] = "Story And Game Management";
            $this->data['dataTableId'] = time();
            $this->data['addUrl'] = route('storyandgame.create');
            return view('admin.pages.storyandgame.index', $this->data);
        }
        return Subcategory::get();
    }

   
    public function create()
    {
        $this->data['dateTableTitle'] = "Add Story And Game";
        $this->data['courses'] = Courses::get(['id','name']);
        $this->data['backUrl'] = route('storyandgame.index');
        return view('admin.pages.storyandgame.create', $this->data);
    }

    
    public function store(Request $request)
    {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:storyandgame',
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
                ->withErrors($validator, 'storyandgame_error');
        } else {
            $input = $request->all();
            $category =  StoryAndGame::create($input);
            if ($category) {
                return redirect()->route('storyandgame.index')->with('success', 'created successfully.');
            }
        }
        return redirect()->route('storyandgame.index')->with('success', 'created successfully.');
    }
    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $this->data['pageTittle'] = "Edit Story And Game";
        $this->data['courses'] = Courses::get(['id','name']);
        $this->data['storyandgame'] = StoryAndGame::find($id);
        $this->data['subcategorydata'] = Subcategory::where('cid',$this->data['storyandgame']->cid)->get(['id','name']);
        $this->data['categorydata'] = Category::where('courses_id',$this->data['storyandgame']->courses_id)->get(['id','name']);
        $this->data['dateTableTitle'] = "Edit Story And Game";
        $this->data['backUrl'] = route('storyandgame.index');
        return view('admin.pages.storyandgame.edit', $this->data);
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:storyandgame,name,'.$id,
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
                ->withErrors($validator, 'storyandgame_error');
        } else {
            $input = $request->all();

            $storyandgame = StoryAndGame::find($id);
            $storyandgame->update($input);
            if ($storyandgame) {
                return redirect()->route('storyandgame.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
    }

    
    public function destroy($id)
    {
        $delete = StoryAndGame::find($id)->delete();
        Session::flash('success', 'Deleted successfully');
        return $delete;
    }
    public function subdropdown($id)
    {
        $subdropdown = Subcategory::where('cid',$id)->get();
        return $subdropdown;
    }
}
