<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ChannelUser;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $userId = Auth::id();
                $channel_infos = DB::table('channel_users') 
                        ->leftJoin('channels', 'channels.id', '=', 'channel_users.channel_id') 
                        ->select(
                            'channel_users.user_id', 
                            'channel_users.channel_id', 
                            'channels.channel_name',
                        )
                        ->where('channel_users.user_id', $userId) 
                        ->get();  

                $favorite_infos = DB::table('favorites')
                        ->leftJoin('posts', 'favorites.user_id', '=', 'posts.user_id')
                        ->select(
                            'posts.user_id',
                            'posts.id',
                            'posts.title',
                        )
                        ->where('posts.user_id', $userId)
                        ->get();
                            

                $view->with(compact(
                    'channel_infos',
                    'favorite_infos'
                ));
            }
        });

    }
}
