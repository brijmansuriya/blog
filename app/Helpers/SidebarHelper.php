<?php

namespace App\Helpers;
use App\Models\Courses;

class SidebarHelper
{
    public static function sidebar($courses_id)
    {
        // return Courses::whereIn('id',$courses_id)->get();
        return Courses::where('id',$courses_id)->get();
    }
}
