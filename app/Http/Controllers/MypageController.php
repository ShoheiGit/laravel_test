<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MypageController extends Controller
{
    public function index($e)
    {
        // ユーザー情報を取得
        $user = DB::table('users')
                    ->select(
                        'users.id',
                        'users.name',
                        'users.profile_text',
                        'users.profile_image',
                        'users.follow',
                        'users.follower'
                    )
                    ->where('users.id', $e)
                    ->first();

        // 記事情報を取得
        $posts = DB::table('posts')
                    ->orderBy('updated_at', 'desc')
                    ->select(
                        'posts.id',
                        'posts.user_id',
                        'posts.title',
                        'posts.content',
                        'posts.image',
                        'posts.updated_at'
                    )
                    ->where('posts.user_id', $e)
                    ->get();

        return view('mypage', compact('user', 'posts'));
    }
}
