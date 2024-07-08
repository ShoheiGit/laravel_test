<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // PostとUserのデータを取得
        $post_infos = DB::table('posts')
                        ->orderBy('updated_at', 'desc')
                        ->leftJoin('users', 'users.id', '=' , 'posts.user_id')
                        ->select(
                            'users.name',
                            'users.profile_image',
                            'posts.user_id',
                            'posts.id',
                            'posts.title',
                            'posts.content',
                            'posts.image',
                            'posts.updated_at',
                        )
                        ->paginate(10);
        // データをビューに渡す
        return view('dashboard', compact('post_infos'));
    }



}
