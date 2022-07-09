<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Courses;
use App\Models\Category;

class Common extends Model
{
    public static function getSidebar(){
    //    $data = [];
     return  $courses = Courses::with('category:id,name','subcategory','storyandgame')->get();

        // $categorys = array();
        // foreach($courses as $categorys){
        //     $categorys[] = $categorys['category'];
        // }

     // return $data['categorys11'] =$categorys;
    //    $data['subcategorys'] = Subcategory::get();
    //    $data['storyandgames'] = StoryAndGame::get();
      // return $data;
    }
}
