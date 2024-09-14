<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {
        return view('create');
    }

    public function create(Request $request)
    {
        // $dir = 'img';

        // $request->file('thumbnail')->store('public/' . $dir);

        return view('dashboard');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'thumbnail'   => 'required|file|mimes:jpg,jpeg,png',
            'title'       => 'required',
            'description' => 'required',
        ]);

        $dir = 'img';
        $file_name = $request->file('thumbnail')->getClientOriginalName();
        $request->file('thumbnail')->storeAs('public/' . $dir, $file_name);

        $post = new Post();
        $post->user_id = auth()->id();  // ログインしているユーザーのIDを挿入
        $post->title = $request->title;
        $post->content = $request->description;
        $post->image = 'storage/' . $dir . '/' . $file_name;
        $post->save();

        return redirect()->action([DashboardController::class, 'index']);

    }

    public function show(string $id): View
    {
        $post = Post::findOrFail($id);
        $user = User::select('profile_image', 'name')
                            ->findOrFail($post->user_id);
        return view('posts.show', compact('post', 'user'));
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $user = User::select('profile_image')
                            ->findOrFail($post->user_id);
        return view('posts.edit', compact('post', 'user'));
    }


    public function update(Request $request, string $id)
    {
        //バリデーション
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $user = User::findOrFail($post->user_id);

        if($request->hasFile('thumbnail')) {
            $dir = 'img';
            $file_name = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/' . $dir, $file_name);

            $post->image   = 'storage/' . $dir . '/' . $file_name;
        }


        $post->title   = $request->title;
        $post->content = $request->description;
        $post->update();


        return view('posts.edit', compact('post', 'user'));
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $user = User::findOrFail($post->user_id);
        $post->delete();

        return redirect()->action([DashboardController::class, 'index']);
    }

}
