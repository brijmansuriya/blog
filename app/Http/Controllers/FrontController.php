<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class FrontController extends Controller
{
    public function index(){
        $post = Post::orderBy('created_at', 'DESC')->Paginate(5);
        return view('front.pages.home',compact('post'));
    }
}
