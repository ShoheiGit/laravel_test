<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MypageController extends Controller
{
    public function index()
    {
        //ログイン中のユーザーID
        $id = Auth::id(); 
        
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
                    ->where('users.id', $id)
                    // ->where('users.id', 11)
                    ->first();

        // 記事情報を取得
        $posts = DB::table('posts')
                    ->select(
                        'posts.user_id',
                        'posts.title',
                        'posts.content',
                        'posts.image',
                        'posts.updated_at'
                    )
                    ->where('posts.user_id', $id)
                    // ->where('posts.user_id', 11)
                    ->get();
                    
        return view('mypage', compact('user', 'posts'));
    }
}
