<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $table='video';

    protected $fillable = [
        'url',
        'cid',
        'scid',
        'courses_id',
        'gsid',
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

    public function courses()
    {
        return $this->belongsTo(Courses::class,'courses_id','id');
    }
 
}
