<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    use HasFactory;

    protected $table='contactus';

    protected $fillable = [
        'email',
        'message',
        ];

     protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    
}
