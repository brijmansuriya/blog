<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_setting';
    protected $fillable = ['site_logo','fav_icon','site_title'];
 
}
