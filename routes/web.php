<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileModalController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ChannelUserController;
use App\Http\Controllers\SidebarController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
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

    //チャンネル
    Route::resource('/channel', ChannelController::class)->names([
        'index'    => 'channel.index',
        'create'   => 'channel.create',
        'store'    => 'channel.store',
        'show'     => 'channel.show',
        '{$channel_id}/edit'     => 'channel.edit',
    ]);

    //チャンネルユーザー
    Route::resource('/channel_user', ChannelUserController::class)->names([
        'store' => 'channelUser.store',
    ]);


    
});

require __DIR__.'/auth.php';
