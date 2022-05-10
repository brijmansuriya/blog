<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Traits\ImageUpload;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    use ImageUpload;
    public function __construct()
    {
        $this->data['menu_title'] = "Category";
    } 

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Category::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($row) {
                    $btn = '<a href="' . route('category.edit', $row['id']) . '" class="mr-2"><i class="fa fa-edit" style="color: #172774;"></i></a>';
                    $delete_link = route('category.destroy', $row['id']);
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
                ['data' => 'description', 'name' => 'description', 'title' => __("description"),'width' => '80%', 'searchable' => true],
                ['data' => 'action', 'name' => 'action', 'title' => "Action", 'searchable' => true, 'orderable' => false]];

            $this->data['dateTableFields'] = $columns;
            $this->data['dateTableUrl'] = route('category.index');
            $this->data['dateTableTitle'] = "Category Management";
            $this->data['dataTableId'] = time();
            $this->data['addUrl'] = route('category.create');
            return view('admin.pages.category.index', $this->data);
        }
        return Category::get();
    }

   
    public function create()
    {
        $this->data['dateTableTitle'] = "Add Category";
        $this->data['backUrl'] = route('category.index');
        return view('admin.pages.category.create', $this->data);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:category',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'category_error')
                ->withInput();
        } else {
            $input = $request->all();
            if ($request->image) {
                $name = $this->imageUpload($request->image, 'category');
                $input['image'] = $name;
            }

            $about = Category::create($input);

          
            if ($about) {
                return redirect()->route('category.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
        return redirect()->route('category.index')->with('success', 'About Us created successfully.');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $this->data['pageTittle'] = "Edit Aboutus";
        $this->data['category'] = Category::find($id);
        $this->data['dateTableTitle'] = "Edit Aboutus";
        $this->data['backUrl'] = route('category.index');
        return view('admin.pages.category.edit', $this->data);
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:category,name,'.$id,
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'category_error')
                ->withInput();
        } else {

            $input = $request->all();
            $input['updated_at'] = date('Y-m-d H:i:s');
            $about = Category::find($id);
            if ($request->image) {
                $name = $this->imageUpload($request->image, 'category');
                $input['image'] = $name;
            }
            $about->update($input);

            if ($about) {
                return redirect()->route('category.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
    }

    
    public function destroy($id)
    {
        $delete = Category::find($id)->delete();
        Session::flash('success', 'Deleted successfully');
        return $delete;
    }
}
