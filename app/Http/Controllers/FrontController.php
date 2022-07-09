<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Common;
use App\Models\StoryAndGame;
use App\Models\Courses;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\CourseSub;
use Validator;
use Auth;
class FrontController extends Controller
{
    public function index(){
        // $user = Auth::user();

        $homepage = 'homepage';
        $sidebardata =  Courses::whereId(2)->with('course_sub')->first();

        echo '<pre>';
        $category = $sidebardata->course_sub->pluck('category.id')->unique()->toArray();
        $subcategory = $sidebardata->course_sub->pluck('subcategory.id')->unique()->toArray();
        $storyandgame = $sidebardata->course_sub->pluck('storyandgame.id')->unique()->toArray();

        $category1 = Category::whereIn('id',$category)->get();
        $subcategory1 =  Subcategory::whereIn('id',$subcategory)->get();
        $storyandgame1 = StoryAndGame::whereIn('id',$storyandgame)->get();

        print_r($category1->toArray());
        print_r($subcategory1->toArray());
        print_r($storyandgame1->toArray());
       
        exit;

       // $courses =  Courses::whereId(2)->first();
      //return  $coursessub =  CourseSub::whereCourseId($courses->id)->get();

        // echo '<pre>';
        // print_r($sidebardata->course_sub->toArray());
        // exit;
        return view('front.pages.dashboard',compact('homepage','category1','subcategory1','storyandgame1'));
    }
    public function editProfile($id){
        $user = User::where('id',$id)->first();
        $sidebardata =  Category::with('subcategory')->get();
        return view('front.pages.profile',compact('user','sidebardata'));
    }

    public function subcategoryview($category='',$subcategory=''){
        $sidebardata =  Category::with('subcategory')->get();
        $gameandstory =  Courses::wherecid($category)->wherescid($subcategory)->get();
        return view('front.pages.part',compact('sidebardata','gameandstory'));
    }

    public function storyandgameview($category='',$subcategory='',$storyandgame=''){
        $sidebardata =  Category::with('subcategory')->get();
        $gameandstory =  StoryAndGame::whereCid($category)->whereScid($subcategory)->get();
        return view('front.pages.part',compact('sidebardata','gameandstory'));
    }
  
}
