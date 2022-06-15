<?php

namespace App\Traits;
use Image;
trait ImageUpload {
	
    public function imageUpload($file, $path)
    {
      $name = $file->getClientOriginalName();
      $name = str_replace(" ", "", date("Ymdhis")+1 . $name);
      $file->move(public_path() . '/uploads/'.$path.'/', $name);
      return $name;
    }

    public function imageUploadResize($file, $path)
    {
      $var = date_create();
      $time = date_format($var, 'YmdHis');
      $rendome = rand(99,999999999);
      $name = $time . '-' .$rendome.'-'. $file->getClientOriginalName();
      $file1=public_path('uploads\\').$path.'\\'. $name;  
      $file2=public_path('uploads\\').$path.'\\'.'750\\'. $name;  
      $file3=public_path('uploads\\').$path.'\\'.'250\\'. $name;  
      $image_resize = Image::make($file->getRealPath())->save($file1);  
      $image_resize = Image::make($file->getRealPath())->resize(750,500)->save($file2);              
      $image_resize = Image::make($file->getRealPath())->resize(400,200)->save($file3);   
      return $name;
    }

    public function imageUploadCkediter($file, $path)
    {
      $name = $file->getClientOriginalName();
      $name = str_replace(" ", "", date("Ymdhis")+1 . $name);
      $file->move(public_path() . '/uploads/'.$path.'/', $name);
      $url = asset('uploads/post/'.$name);
      return response()->json(['name'=>$name,'uploaded'=>1,'url'=>$url]);
    }
}