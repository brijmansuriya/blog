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
      
        return view('front.pages.dashboard');
    }
  
}
