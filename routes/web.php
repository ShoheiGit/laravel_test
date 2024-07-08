<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileModalController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'verified'])->group(function () {
    // DashboardControllerのindexメソッドを/dashboardにマップ
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/mypage/{user_id}', [MyPageController::class, 'index'])->name('mypage.index');


    //投稿の作成・編集等
    Route::resource('/create', PostController::class)->names([
        'index'   => 'post.index',
        'create'  => 'post.create',
        'store'   => 'post.store',
        'show'    => 'post.show',
        'edit'    => 'post.edit',
        'update'  => 'post.update',
        'destroy' => 'post.destroy',
    ]);
});

require __DIR__.'/auth.php';
