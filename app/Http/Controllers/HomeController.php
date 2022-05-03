<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class HomeController extends Controller
{

    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function postImageUplode(Request $request)
    {
        if($request->hasFile('upload')){
            $originalname = $request->upload->getClientOriginalName();
            $fileName = pathinfo($originalname,PATHINFO_FILENAME);
            $extension = $request->upload->getClientOriginalExtension();
            $fileName = $fileName . '_'.time() . '.' .  $extension;
            $request->upload->move(public_path('uploads/post'),$fileName);
            $url = asset('uploads/post/'.$fileName);
            return response()->json(['fileName'=>$fileName,'uploaded'=>1,'url'=>$url]);
        }
    }
}
