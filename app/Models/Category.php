<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table='category';

    protected $fillable = [
        'name',
        'courses_id',
    ];

     protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function getImageAttribute($image)
    {
        return $image == null ? url('/default.png') : url('/uploads/category/' . $image);
    }

    public function courses()
    {
        return $this->belongsTo(Courses::class,'courses_id','id');
    }

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class,'cid','id')->with('game');
    }
    
}
