<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
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
        'created_at',
        'slug',
        'image',
        'category_id',
        'active',
    ];

     protected $hidden = [
        'updated_at',
        'deleted_at',
    ];


    public function getImageAttribute($image)
    {
        return $image == null ? url('/default.png') : url('/uploads/post/250/' . $image);
    }


    public function PostBody()
    {
        return $this->hasMany(PostBody::class,'post_id','id');
    }
   

}
