<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Models\Courses;
use App\Traits\ImageUpload;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    use ImageUpload;
    public function __construct()
    {
        $this->middleware('is_admin');
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
        $this->data['courses'] = Courses::get(['id','name']);
        $this->data['backUrl'] = route('category.index');
        return view('admin.pages.category.create', $this->data);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:category',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'category_error')
                ->withInput();
        } else {
            $input = $request->all();
            $category = Category::create($input);
            if ($category) {
                return redirect()->route('category.index')->with('success', 'created successfully.');
            }
        }
        return redirect()->route('category.index')->with('success', 'created successfully.');
    }
    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $this->data['pageTittle'] = "Edit Category";
        $this->data['category'] = Category::find($id);
        $this->data['courses'] = Courses::get(['id','name']);
        $this->data['dateTableTitle'] = "Edit Category";
        $this->data['backUrl'] = route('category.index');
        return view('admin.pages.category.edit', $this->data);
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:category,name,'.$id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'category_error')
                ->withInput();
        } else {

            $input = $request->all();
            $input['updated_at'] = date('Y-m-d H:i:s');
            $category = Category::find($id);
            $category->update($input);

            if ($category) {
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
