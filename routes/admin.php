

<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\SchoolController;
use App\Http\Controllers\admin\StoryAndGameController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\CoursesController;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    Route::resource('video', VideoController::class);
    Route::get('site-setting', [SiteSettingController::class,'index'])->name('site-setting');
    Route::post('site-setting', [SiteSettingController::class,'update'])->name('site-setting.update');
    Route::get('school/active/{id?}/{active?}', [SchoolController::class,'active'])->name('school.active');

    Route::get('school/password/{id?}', [SchoolController::class,'passwordEdit'])->name('school.password');
    Route::Post('school/password/{id?}', [SchoolController::class,'passwordUpdate'])->name('school.passwordupdate');

    Route::get('subcategory/subdropdown/{id?}', [SubcategoryController::class,'subdropdown'])->name('subcategory.subdropdown');
    Route::get('category/dropdown/{id?}', [SubcategoryController::class,'dropdown'])->name('category.dropdown');
    Route::get('storyandgame/subdropdown/{id?}', [StoryAndGameController::class,'subdropdown'])->name('storyandgame.subdropdown');
    Route::get('storyandgame/gsdropdown/{id?}', [CoursesController::class,'gsdropdown'])->name('storyandgame.gsdropdown');

    Route::get('count', [SchoolController::class,'count'])->name('count');
});