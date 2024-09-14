<?php

namespace App\Http\Controllers;

use App\Models\ChannelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChannelUserController extends Controller
{
        public function store(Request $request)
    {
        $user = Auth::user();
        $channelId = $request->input('id');

        if ($user->channels()->where('channel_id', $channelId)->exists()) {
            // フォロー解除
            $user->channels()->detach($channelId);
            return response()->json(['status' => 'unfollowed']);
        } else {
            // フォロー
            $user->channels()->attach($channelId);
            return response()->json(['status' => 'followed']);
        }
    }

}
