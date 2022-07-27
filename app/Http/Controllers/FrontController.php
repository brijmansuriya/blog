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
use App\Models\Video;
use App\Models\School;
use App\Helpers\SidebarHelper;
use Validator;
use App\Traits\ImageUpload;
use Auth;
use DB;

class FrontController extends Controller
{
    use ImageUpload;

    public function index(){
        $user = Auth::user();
        $homepage = 'homepage';
        $coursesdata ='';
        $sidebardata ='';
        if(isset($user->courses)){

            $coursesid = explode(",",$user->courses);
            $coursesdata = SidebarHelper::sidebar($coursesid);
            // $coursesdata = Courses::whereIn('id',$coursesid)->get();
            $sidebardata =  Category::where('courses_id',$user->courses)->get();
        }

        return view('front.pages.dashboard',compact('homepage','coursesdata','sidebardata'));
    }
    public function editProfile($id){
        $user = User::where('id',$id)->first();
        $sidebardata =  Category::where('courses_id',$user->courses)->get();
        return view('front.pages.profile',compact('user','sidebardata'));
    }

    public function subcategoryview($category='',$subcategory=''){
        // $sidebardata =  Category::where('courses_id',$user->courses)->get();
        $coursesdata = SidebarHelper::sidebar($user->courses);
        $gameandstory =  Courses::wherecid($category)->wherescid($subcategory)->get();
        $phone = MessagesHelper::send($request->phone,'');
        return view('front.pages.part',compact('sidebardata','gameandstory'));
    }

    public function storyandgameview($category='',$subcategory='',$storyandgame=''){
        $sidebardata =  Category::where('courses_id',$user->courses)->get();
        $gameandstory =  StoryAndGame::whereCid($category)->whereScid($subcategory)->get();
        return view('front.pages.part',compact('sidebardata','gameandstory'));
    }

    public function coursesview($courses=''){
        $user = Auth::user();
        $deropdwuan = '';
        if($courses!=''){
            $deropdwuan ='data-opened';
            \Session::put('course_id', $courses);
        }

        $homepage = 'homepage';
        $coursesid = explode(",",$user->courses);
        // $coursesdata = Courses::whereIn('id',$coursesid)->get();
        $coursesdata = SidebarHelper::sidebar($courses);
        $sidebardata =  Category::where('courses_id',$courses)->get();
        return view('front.pages.dashboard',compact('homepage','coursesdata','sidebardata','deropdwuan'));
    }

    public function partview($partid=''){
        $user = Auth::user();
        $storyandgame = StoryAndGame::where('scid',$partid)->get();

        $sidebardata =  Category::where('courses_id',$user->courses)->get();
        return view('front.pages.part',compact('storyandgame','sidebardata'));
    }

    public function gameandstory($gameandstoryid=''){
        $user = Auth::user();
        $sidebardata =  Category::where('courses_id',$user->courses)->get();
        $storyandgame = Video::where('gsid',$gameandstoryid)->simplePaginate(1);
        return view('front.pages.storyandgame',compact('storyandgame','sidebardata'));
    }

    public function updateProfile(Request $request,$id){
        $input = $request->all();
        $school = School::find($id);
        if ($request->image) {
            $name = $this->imageUpload($request->image,'courses');
            $input['image'] = $name;
        }
        $school->update($input);
        return back();
    }
  
}
