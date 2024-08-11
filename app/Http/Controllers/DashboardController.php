<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\models\ChannelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
        
        $channel_infos = DB::table('channel_users') 
                        ->leftJoin('channels', 'channels.id', '=', 'channel_users.channel_id') 
                        ->select(
                            'channel_users.user_id', 
                            'channel_users.channel_id', 
                            'channels.channel_name',
                        )
                        ->where('channel_users.user_id', Auth::id()) 
                        ->get();

        return view('dashboard', compact(
            'post_infos',
            'channel_infos',
        ));
    }
}
