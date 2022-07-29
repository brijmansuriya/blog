<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class videoCount extends Model
{

    protected $table = 'video_count';
    protected $appends = ['count'];
    protected $fillable = [
        'school_id',
        'course_id',
        'video_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function videoCount($SchoolId, $CourseId, $VideoId)
    {
        return videoCount::whereSchoolId($SchoolId)
            ->whereCourseId($CourseId)
            ->whereVideoId($VideoId)
            ->count();
    }

    public function courseCount($SchoolId, $CourseId)
    {
        return videoCount::whereSchoolId($SchoolId)
            ->whereCourseId($CourseId)
            ->count();
    }

    public function schooCount($SchoolId)
    {
        return videoCount::whereSchoolId($SchoolId)->count();
    }

    public function school(){
        return $this->hasOne(School::class, 'id', 'school_id');
    }
    public function course(){
        return $this->hasOne(Courses::class, 'id', 'course_id');
    }
    public function video(){
        return $this->hasOne(Video::class, 'id', 'video_id');
    }


    public function getCountAttribute()
    {
        return videoCount::whereSchoolId($this->school_id)->whereCourseId($this->course_id)->whereVideoId($this->video_id)->count();

    }
}
