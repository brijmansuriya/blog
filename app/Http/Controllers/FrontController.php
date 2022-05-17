<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class FrontController extends Controller
{
    public function index(){
        $post = Post::orderBy('created_at', 'DESC')->Paginate(5);
        return view('front.pages.home',compact('post'));
    }
    public function getpost($slug){
        $postdata = Post::whereSlug($slug)->first();
        $category = Category::get();
        $tegs = Post::get('keywords');
        $tagsaaray=[];
        foreach($tegs as $value){
            $tags= explode(",",$value['keywords'] ); 
            foreach($tags as $tag){
                $tagsaaray[] = $tag; 
            }
        }
        $tagsaaray= array_unique($tagsaaray);
       return view('front.pages.blog',compact('postdata','category','tagsaaray'));
    }
    public function contactus(){
       
       return view('front.pages.contactus');
    }
    public function contactusSubmit(Request $request){
       print_r($request->post());
       exit;
       return view('front.pages.contactus');
    }
    public function about(Request $request){
    
       return view('front.pages.about');
    }
    public function author(Request $request){
    
       return view('front.pages.author');
    }
    public function contact(Request $request){
    
       return view('front.pages.contact');
    }
}
