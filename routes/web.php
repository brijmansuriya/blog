<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\SchoolController;
use App\Http\Controllers\admin\StoryAndGameController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactusController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('fronthome');
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
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('school', SchoolController::class);
    Route::resource('storyandgame', StoryAndGameController::class);
    Route::get('site-setting', [SiteSettingController::class,'index'])->name('site-setting');
    Route::get('school/active/{id?}/{active?}', [SchoolController::class,'active'])->name('school.active');
    Route::get('storyandgame/subdropdown/{id?}', [StoryAndGameController::class,'subdropdown'])->name('storyandgame.subdropdown');
    Route::post('site-setting', [SiteSettingController::class,'update'])->name('site-setting.update');
});