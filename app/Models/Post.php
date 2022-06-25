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
        'slug',
        'image',
        'category_id',
        'active',
        'created_at',
        'created_by',
    ];

     protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'created_at' => 'date:Y-m-d',
    ];

    public function getImageAttribute($image)
    {
        return $image == null ? url('/default.png') : url('/uploads/post/' . $image);
    }


    public function PostBody()
    {
        return $this->hasMany(PostBody::class,'post_id','id');
    }
   
    public function postUser()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
