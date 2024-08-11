<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; 
use Illuminate\Support\Facades\DB;
use App\models\Channel;

class ChannelController extends Controller
{
    public function index()
    {
        $channels = DB::table('channels')->get();

        return view('channel', compact('channels'));
    }

    public function create()
    {
        return view('channel.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'channel_image'        => 'required|file|mimes:jpg,jpeg,png',
            'channel_name'         => 'required',
            'channel_discription'  => 'required',
        ]);

        $dir = 'img';
        $file_name = $request->file('channel_image')->getClientOriginalName();
        $request->file('channel_image')->storeAs('public/' . $dir, $file_name);

        $channel = new Channel;
        $channel->channel_name = $request->channel_name;
        $channel->discription  = $request->channel_discription; 
        $channel->image        = 'storage/' . $dir . '/' . $file_name;
        $channel->save();

        return redirect()->route('channel.index')->with('success', 'チャンネルが作成されました');
    }

    public function show($id)
    {
        $channel = Channel::findOrFail($id);

        return view('channel.show', compact('channel'));
    }
}
