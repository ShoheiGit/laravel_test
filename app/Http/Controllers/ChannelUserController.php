<?php

namespace App\Http\Controllers;

use App\Models\ChannelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChannelUserController extends Controller
{
    public function store(Request $request)
    {
        $existingUser = ChannelUser::where('user_id', Auth::id())->where('channel_id', $request->id)->first();
        
        if ($existingUser) {
            return back()->with('message', 'すでにフォローしてます');
        }

        $channelUser             = new ChannelUser;
        $channelUser->user_id    = Auth::id();
        $channelUser->channel_id = $request->id;
        $channelUser->save();
        
        return back()->with('message', 'フォローしました');
    }
}
