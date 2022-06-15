<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Contactus;
use App\Models\Category;
use Validator;
class FrontController extends Controller
{
    public function index(){
      
        $post = Post::whereActive(1)->orderBy('created_at', 'DESC')->Paginate(10);
        return view('front.pages.Home',compact('post'));
    }
    public function getpost($slug){
        $postdata = Post::whereSlug($slug)->whereActive(1)->first();
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
      $validator = Validator::make($request->all(), [
         'email' => 'required',
         'message' => 'required',
     ]);

      if ($validator->fails()) {
            return redirect()->back()
               ->withErrors($validator,'posts_error')
               ->withInput();
      } else {
            $input = $request->all();
            $contactus = Contactus::create($input);
            return redirect()->back()->with('success', 'Successfully');
      }
    }
    public function about(Request $request){
    
       return view('front.pages.about');
    }
    public function team(Request $request){
    
       return view('front.pages.team');
    }
    public function contact(Request $request){
    
       return view('front.pages.contact');
    }
    public function subscribe(Request $request){
    
      $validator = Validator::make($request->all(), [
         'email' => 'required',
     ]);

      if ($validator->fails()) {
            return redirect()->back()
               ->withErrors($validator,'posts_error')
               ->withInput();
      } else {
            $input = $request->all();
            $contactus = Subscribe::create($input);
            return redirect()->back()->with('success', 'Successfully');
      }

       return view('front.pages.contact');
    }
}
