<?php

namespace App\Helpers;
use App\Models\Courses;

class SidebarHelper
{
    public static function sidebar($courses_id)
    {
        // return Courses::whereIn('id',$courses_id)->get();
        return Courses::whereIn('id',$courses_id)->get();
    }

    public static function getCourses($courses_id)
    {
        $name = Courses::whereId($courses_id)->first('name');
        return $name->name;
    }


}
