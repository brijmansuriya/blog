<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSub extends Model
{
    protected $table='course_sub';
    protected $fillable = [
        'cid',
        'scid',
        'gsid',
        'url',
        'course_id',
    ];
     protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class,'cid','id');
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
