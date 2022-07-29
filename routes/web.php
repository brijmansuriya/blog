<?php
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('fronthome');
Route::get('/edit-profile/{id?}', [FrontController::class, 'editProfile'])->name('editprofile');

Route::Post('/update-profile/{id?}', [FrontController::class, 'updateProfile'])->name('updateprofile');

Route::Post('video/count', [FrontController::class, 'videoCount'])->name('videocount');

Route::Post('video-count-get', [FrontController::class, 'videoCountGet'])->name('videocountget');

Route::get('/courses-view/{courses?}', [FrontController::class, 'coursesview'])->name('coursesview');

Route::get('partview/{partid?}', [FrontController::class, 'partview'])->name('partview');
Route::get('gameandstory/{gameandstoryid?}', [FrontController::class, 'gameandstory'])->name('gameandstory');

Route::get('/711', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('view:clear');
    dd('cache clear');
});
