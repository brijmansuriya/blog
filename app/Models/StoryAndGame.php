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
    ];

     protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


 
}
