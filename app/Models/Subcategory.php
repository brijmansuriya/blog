<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table='subcategory';

    protected $fillable = [
        'cid',
        'courses_id',
        'name',
    ];

     protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function game()
    {
        return $this->hasMany(StoryAndGame::class,'scid','id');
    }

    public function courses()
    {
        return $this->belongsTo(Courses::class,'courses_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'cid','id');
    }
}
