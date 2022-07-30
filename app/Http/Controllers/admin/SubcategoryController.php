<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Courses;
use App\Models\School;
use App\Models\Category;
use App\Models\Subcategory;
use Validator;
class SubcategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_admin');
        $this->data['menu_title'] = "Sub Category";
    } 

    public function index(Request $request)
    {
        $this->data['courses'] = Courses::get(['id','name']);
        // $this->data['categorydata'] = Category::get(['id','name']);
        if ($request->ajax()) {
            $data = Subcategory::orderBy('created_at', 'DESC')->get();
            $datat =  DataTables::of($data);

            if ($request->has('courses_id')) {
                $datat->filter(function ($instance) use ($request) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                        if ($request->get('courses_id') == "0" AND $request->get('cid') == "0") {
                            return true;
                        }else if($request->get('courses_id') != "0" AND $request->get('cid') == "0"){
                            return $row['courses_id'] == $request->get('courses_id') ? true : false;
                        }else if($request->get('cid') != "0" AND $request->get('courses_id') == "0"){
                            return $row['cid'] == $request->get('cid') ? true : false;
                        }
                        return $row['courses_id'] == $request->get('courses_id') AND $row['cid'] == $request->get('cid') ? true : false;

                    });
                    
                });
            }
       

                return $datat->addIndexColumn()
                ->editColumn('courses', function ($row) {
                    return $row->courses->name;
                })
                ->editColumn('category', function ($row) {
                    return $row->category->name;
                })
                ->editColumn('action', function ($row) {
                    $btn = '<a href="' . route('subcategory.edit', $row['id']) . '" class="mr-2"><i class="fa fa-edit" style="color: #172774;"></i></a>';
                    $delete_link = route('subcategory.destroy', $row['id']);
                    $delete_link = "'" . $delete_link . "'";
                    $btn .= '<a href="javascript:void(0);" onclick="deleteRecord(' . $delete_link . ');" data-popup="tooltip"><i class="fa fa-trash" style="color: #172774;"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        } else {
            $columns = [
                ['data' => 'DT_RowIndex', 'name' => 'id', 'title' => "Id"],
                ['data' => 'courses', 'name' => 'courses', 'title' => __("Courses")],
                ['data' => 'category', 'name' => 'category', 'title' => __("Category")],
                ['data' => 'name', 'name' => 'name', 'title' => __("Name"), 'searchable' => true],
                ['data' => 'action', 'name' => 'action', 'title' => "Action",  'orderable' => false]];

            $this->data['dateTableFields'] = $columns;
            $this->data['dateTableUrl'] = route('subcategory.index');
            $this->data['dateTableTitle'] = "Part Management";
            $this->data['dataTableId'] = time();
            $this->data['addUrl'] = route('subcategory.create');
            $this->data['title'] = 'Sub Category';
            return view('admin.pages.subcategory.index', $this->data);
        }
        return Subcategory::get();
    }

   
    public function create()
    {
        $this->data['dateTableTitle'] = "Add Sub Category";
        $this->data['courses'] = Courses::get(['id','name']);
        $this->data['categorydata'] = Category::get(['id','name']);
        $this->data['backUrl'] = route('subcategory.index');
        $this->data['title'] = 'Sub Category';
        return view('admin.pages.subcategory.create', $this->data);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|unique:subcategory',
            'cid'=>'required|not_in:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'category_error')
                ->withInput();
        } else {
            $input = $request->all();
            $category = Subcategory::create($input);
            if ($category) {
                return redirect()->route('subcategory.index')->with('success', 'created successfully.');
            }
        }
        return redirect()->route('subcategory.index')->with('success', 'created successfully.');
    }
    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $this->data['pageTittle'] = "Edit Aboutus";
        $this->data['subcategory'] = Subcategory::find($id);
        $this->data['courses'] = Courses::get(['id','name']);
        $this->data['categorydata'] = Category::where('courses_id',$this->data['subcategory']->courses_id)->get(['id','name']);
        $this->data['dateTableTitle'] = "Edit Aboutus";
        $this->data['backUrl'] = route('subcategory.index');
        $this->data['title'] = 'Sub Category';
        return view('admin.pages.subcategory.edit', $this->data);
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|unique:subcategory,name,'.$id,
            'cid'=>'required|not_in:0'
        ]);

      
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'category_error');
        } else {
            $input = $request->all();
            $input['updated_at'] = date('Y-m-d H:i:s');
            $category = Subcategory::find($id);
            $category->update($input);
            if ($category) {
                return redirect()->route('subcategory.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
    }

    
    public function destroy($id)
    {
        $delete = Subcategory::find($id)->delete();
        Session::flash('success', 'Deleted successfully');
        return $delete;
    }

    public function subdropdown($id)
    {
        $subdropdown = Subcategory::where('cid',$id)->get();
        return $subdropdown;
    }

    public function dropdown($id)
    {
        $subdropdown = Category::where('courses_id',$id)->get();
        return $subdropdown;
    }
    public function coursesdropdown($id)
    {
        $school = School::where('id',$id)->first();
        $coursesdropdown = Courses::whereIn('id',explode(",",$school->courses))->get(['id','name']);
        return $coursesdropdown;
    }
}
