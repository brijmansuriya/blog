<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class PostBody extends Model
{
    use HasFactory;

    protected $table='post_body';

    protected $fillable = [
        'post_id',
        'body',
    ];

     protected $hidden = [
        'category_id',
        'updated_at',
        'deleted_at',
    ];


    public function getImageAttribute($image)
    {
        return $image == null ? url('/default.png') : url('/uploads/post/' . $image);
    }

   

}
