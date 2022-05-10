<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table='post';

    protected $fillable = [
        'title',
        'body',
        'description',
        'keywords',
        'metadescription',
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

}
