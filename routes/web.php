<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\ContactusController;
use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index']);
Route::get('home/post/{slug?}', [FrontController::class, 'getpost'])->name('home.post');
Route::get('/contactus', [FrontController::class, 'contactus'])->name('contactus');
Route::Post('/contactus', [FrontController::class, 'contactusSubmit'])->name('contactus');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/team', [FrontController::class, 'team'])->name('team');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::Post('/subscribe', [FrontController::class, 'subscribe'])->name('subscribe');
Route::get('/category-post/{slug?}', [FrontController::class, 'categoryPost'])->name('categorypost');
Route::get('/tagpost/{slug?}', [FrontController::class, 'tagPost'])->name('tagpost');

Route::get('/privacypolicy', [FrontController::class, 'privacyPolicy'])->name('privacypolicy');

Route::get('/711', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('view:clear');
    dd('cache clear');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('category', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::get('posts/description/{id}', [PostController::class,'adddescription'])->name('posts.description');
    
    Route::Post('postimageuplode',[HomeController::class,'postImageUplode'])->name('ckeditor.postimageuplode');

    Route::get('site-setting', [SiteSettingController::class,'index'])->name('site-setting');
    Route::post('site-setting', [SiteSettingController::class,'update'])->name('site-setting.update');

    Route::resource('contact-us', ContactusController::class);
});