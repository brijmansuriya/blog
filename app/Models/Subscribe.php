<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Subscribe extends Model
{
    use HasFactory;

    protected $table='subscribe';

    protected $fillable = [
        'email',
       
    ];

     protected $hidden = [
        'updated_at',
        'deleted_at',
    ];


    public function getImageAttribute($image)
    {
        return $image == null ? url('/default.png') : url('/uploads/post/' . $image);
    }

   

}
