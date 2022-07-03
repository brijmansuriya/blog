<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    } 

    public function index()
    {
        return view('admin.pages.dashboard');
    }

}
