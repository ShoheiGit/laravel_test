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
        // $posts = Post::orderBy('updated_at', 'desc')->get();
        // $users = User::all();
        $post_infos = DB::table('posts')
                        ->leftJoin('users', 'users.id', '=' , 'posts.id')
                        ->select(
                            'users.name',
                            'users.profile_image',
                            'posts.title',
                            'posts.content',
                            'posts.image',
                            'posts.updated_at',
                        )
                        ->paginate(10);
                        // ->get();
        // dd($post_infos);

        // データをビューに渡す
        return view('dashboard', compact('post_infos'));
    }



}
