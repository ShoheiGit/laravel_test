<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

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

        return view('dashbord');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png.jpg,gif,svg|max:2048',
        ]);

        $post = new Post;

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
    }


}
