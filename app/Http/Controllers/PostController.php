<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Traits\ImageUpload;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    use ImageUpload;
    public function __construct()
    {
        $this->data['menu_title'] = "Post";
    } 

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($row) {
                    $btn = '<a href="' . route('post.edit', $row['id']) . '" class="mr-2"><i class="fa fa-edit" style="color: #172774;"></i></a>';
                    $delete_link = route('post.destroy', $row['id']);
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
                ['data' => 'description', 'name' => 'description', 'title' => __("description"), 'searchable' => true],
                ['data' => 'action', 'name' => 'action', 'title' => "Action", 'searchable' => true, 'orderable' => false]];

            $this->data['dateTableFields'] = $columns;
            $this->data['dateTableUrl'] = route('post.index');
            $this->data['dateTableTitle'] = "Category Management";
            $this->data['dataTableId'] = time();
            $this->data['addUrl'] = route('post.create');
            return view('admin.pages.post.index', $this->data);
        }
        return Category::get();
    }

   
    public function create()
    {
        $this->data['dateTableTitle'] = "Add Category";
        $this->data['backUrl'] = route('post.index');
        return view('admin.pages.post.create', $this->data);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'category_error')
                ->withInput();
        } else {
            $input = $request->all();
            if ($request->image) {
                $name = $this->imageUpload($request->image, 'post');
                $input['image'] = $name;
            }
            $about = Category::create($input);
            if ($about) {
                return redirect()->route('post.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
        return redirect()->route('post.index')->with('success', 'About Us created successfully.');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $this->data['pageTittle'] = "Edit Aboutus";
        $this->data['post'] = Category::find($id);
        $this->data['dateTableTitle'] = "Edit Aboutus";
        $this->data['backUrl'] = route('post.index');
        return view('admin.pages.post.edit', $this->data);
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:post,name,'.$id,
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
                $name = $this->imageUpload($request->image, 'post');
                $input['image'] = $name;
            }
            $about->update($input);

            if ($about) {
                return redirect()->route('post.index')->with('success', 'Successfully Updated');
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
    public function postImageUplode(Request $request)
    {
        if($request->hasFile('upload')){
            $originalname = $request->upload->getClientOriginalName();
            $fileName = pathinfo($originalname,PATHINFO_FILENAME);
            $extension = $request->upload->getClientOriginalExtension();
            $fileName = $fileName . '_'.time() . '.' .  $extension;
            $request->upload->move(public_path('uploads/post'),$fileName);
            $url = asset('uploads/post/'.$fileName);
            return response()->json(['fileName'=>$fileName,'uploaded'=>1,'url'=>$url]);
        }
    }
}
