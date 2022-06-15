<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostBody;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Traits\ImageUpload;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

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
                    $btn = '<a title="Edit Post" href="' . route('posts.edit', $row['id']) . '" class="mr-2"><i class="fa fa-edit" style="color: #172774;"></i></a>';
                    $delete_link = route('posts.destroy', $row['id']);
                    $delete_link = "'" . $delete_link . "'";
                    $btn .= '<a href="javascript:void(0);" title="Delete Post" onclick="deleteRecord(' . $delete_link . ');" data-popup="tooltip"><i class="fa fa-trash" style="color: #172774;"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        } else {
            $columns = [
                ['data' => 'DT_RowIndex', 'name' => 'id', 'title' => "Id"],
                ['data' => 'title', 'name' => 'title', 'title' => __("Title"), 'searchable' => true,'width' => '80%'],
                ['data' => 'action', 'name' => 'action', 'title' => "Action", 'searchable' => true, 'orderable' => false]];
            $this->data['dateTableFields'] = $columns;
            $this->data['dateTableUrl'] = route('posts.index');
            $this->data['dateTableTitle'] = "Posts Management";
            $this->data['dataTableId'] = time();
            $this->data['addUrl'] = route('posts.create');
            return view('admin.pages.posts.index', $this->data);
        }
        return Post::get();
    }
   
    public function create()
    {
        $this->data['dateTableTitle'] = "Add Posts";
        $this->data['backUrl'] = route('posts.index');
        $this->data['cetegory'] = Category::get(['id','name']);
        return view('admin.pages.posts.create', $this->data);
    }
        
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'keywords' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator,'posts_error')
                ->withInput();
        } else {
            $input = $request->all();
            if ($request->image) {
                $name = $this->imageUploadResize($request->image,'post');
                $input['image'] = $name;
            }

            if (isset($request->active)) {
                $input['active'] = $request->active;
            }else{
                $input['active'] = 0;
            }
          
            $input['keywords'] = implode(",",$input['keywords']);
            $input['slug'] = Str::slug($input['title'].'/'.date('Y-m-d-h-i-s'));
            $post = Post::create($input);
            $postId = $post->id;
            $postbody = array();
            // for ($i = 1; $i <= $request->cloop; $i++){
            //     $test = 'body_'.$i;
            //     $postbody = array(
            //         'post_id' => $postId,
            //         'body' => $request->$test,
            //     );
            //     $post = PostBody::create($postbody);
            // }

            if ($post) {
                return redirect()->route('posts.index')->with('success', 'Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again');
            }
        }
        return redirect()->route('posts.index')->with('success', 'post Us created successfully.');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $this->data['pageTittle'] = "Edit Post";
        $this->data['posts'] = Post::with('PostBody')->find($id);
        $this->data['dateTableTitle'] = "Edit Post";
        $this->data['backUrl'] = route('posts.index');
        $this->data['cetegory'] = Category::get(['id','name']);
        return view('admin.pages.posts.edit', $this->data);
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'keywords' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'posts_error')
                ->withInput();
        } else {
            $input = $request->all();
            if ($request->image) {
                $name = $this->imageUpload($request->image, 'post');
                $input['image'] = $name;
            }

            if (isset($request->active)) {
                $input['active'] = $request->active;
            }else{
                $input['active'] = 0;
            }
            
            // for ($i = 1; $i <= $request->cloop; $i++){
            //     $test = 'body_'.$i;
            //     $subid = 'subid_'.$i;
            //     $postbody = array(
            //         'post_id' => $id,
            //         'body' => $request->$test,
            //     );
            //     // $post = PostBody::update($postbody);
            //     $post = PostBody::find($request->$subid);
            //     $post->update($postbody);
            // }

            $post = Post::find($id);
            $input['keywords'] = implode(",",$input['keywords']);
            $post->update($input);
            if ($post) {
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
    public function adddescription($id)
    {
       $params = array('id' => $id);
       return view('admin.pages.posts.cloop', $params);
    }
}