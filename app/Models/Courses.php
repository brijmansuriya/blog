<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table='courses';
    protected $fillable = [
        'cid',
        'scid',
        'gsid',
        'url',
        'image',
        'name',
    ];
     protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function course_sub()
    {
        return $this->hasMany(CourseSub::class,'course_id','id')->with('category','subcategory:id,name','storyandgame:id,name');

        //return $this->hasMany(CourseSub::class,'course_id','id');
    }
   

    public function category()
    {
        return $this->hasOne(Category::class,'cid','cid')->first();
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class,'scid','id');
    }
    public function storyandgame()
    {
        return $this->belongsTo(StoryAndGame::class,'gsid','id');
    }

    public function getImageAttribute($image)
    {
        return $image == null ? url('/default.png') : url('/uploads/courses/' . $image);
    }
    
}
