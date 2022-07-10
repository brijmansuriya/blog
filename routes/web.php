<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\SchoolController;
use App\Http\Controllers\admin\StoryAndGameController;
use App\Http\Controllers\admin\CoursesController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactusController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('fronthome');
Route::get('/edit-profile/{id?}', [FrontController::class, 'editProfile'])->name('editprofile');
Route::get('/subcategory-view/{category?}/{subcategory?}', [FrontController::class, 'subcategoryview'])->name('subcategoryview');
Route::get('/storyandgame-view/{category?}/{subcategory?}/{storyandgame?}',[FrontController::class, 'storyandgameview'])->name('storyandgameview');

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
    Route::resource('courses', CoursesController::class);
    Route::get('site-setting', [SiteSettingController::class,'index'])->name('site-setting');
    Route::post('site-setting', [SiteSettingController::class,'update'])->name('site-setting.update');
    Route::get('school/active/{id?}/{active?}', [SchoolController::class,'active'])->name('school.active');

    Route::get('subcategory/subdropdown/{id?}', [SubcategoryController::class,'subdropdown'])->name('subcategory.subdropdown');

    Route::get('category/dropdown/{id?}', [SubcategoryController::class,'dropdown'])->name('category.dropdown');

    Route::get('storyandgame/subdropdown/{id?}', [StoryAndGameController::class,'subdropdown'])->name('storyandgame.subdropdown');

    Route::get('storyandgame/gsdropdown/{id?}', [CoursesController::class,'gsdropdown'])->name('storyandgame.gsdropdown');

   
});