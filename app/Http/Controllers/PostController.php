<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
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
            $data = Post::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($row) {
                    $btn = '<a href="' . route('posts.edit', $row['id']) . '" class="mr-2"><i class="fa fa-edit" style="color: #172774;"></i></a>';
                    $delete_link = route('posts.destroy', $row['id']);
                    $delete_link = "'" . $delete_link . "'";
                    $btn .= '<a href="javascript:void(0);" onclick="deleteRecord(' . $delete_link . ');" data-popup="tooltip"><i class="fa fa-trash" style="color: #172774;"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        } else {
            $columns = [
                ['data' => 'DT_RowIndex', 'name' => 'id', 'title' => "Id"],
                ['data' => 'title', 'name' => 'title', 'title' => __("Title"), 'searchable' => true],
                ['data' => 'action', 'name' => 'action', 'title' => "Action", 'searchable' => true, 'orderable' => false]];
            $this->data['dateTableFields'] = $columns;
            $this->data['dateTableUrl'] = route('posts.index');
            $this->data['dateTableTitle'] = "Category Management";
            $this->data['dataTableId'] = time();
            $this->data['addUrl'] = route('posts.create');
            return view('admin.pages.posts.index', $this->data);
        }
        return Category::get();
    }

   
    public function create()
    {
        $this->data['dateTableTitle'] = "Add Category";
        $this->data['backUrl'] = route('posts.index');
        $this->data['cetegory'] = Category::get(['id','name']);
        return view('admin.pages.posts.create', $this->data);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator,'posts_error')
                ->withInput();
        } else {
           $input = $request->all();
            
            // if ($request->image) {
            //     $name = $this->imageUpload($request->image, 'post');
            //     $input['image'] = $name;
            // }
            $about = Post::create($input);
            if ($about) {
                return redirect()->route('posts.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
        return redirect()->route('posts.index')->with('success', 'About Us created successfully.');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $this->data['pageTittle'] = "Edit Aboutus";
        $this->data['posts'] = Post::find($id);
        $this->data['dateTableTitle'] = "Edit Aboutus";
        $this->data['backUrl'] = route('posts.index');
        $this->data['cetegory'] = Category::get(['id','name']);
        return view('admin.pages.posts.edit', $this->data);
    }

    
    public function update(Request $request, $id)
    {
    
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'posts_error')
                ->withInput();
        } else {
            $input = $request->all();
            $about = Post::find($id);
            $about->update($input);
            if ($about) {
                return redirect()->route('posts.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
    }

    
    public function destroy($id)
    {
        $delete = Post::find($id)->delete();
        Session::flash('success', 'Deleted successfully');
        return $delete;
    }
   
}
