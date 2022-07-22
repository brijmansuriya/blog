<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryAndGame extends Model
{

    protected $table='storyandgame';

    protected $fillable = [
        'scid',
        'cid',
        'name',
        'courses_id'
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

    public function courses()
    {
        return $this->belongsTo(Courses::class,'courses_id','id');
    }
 
}
