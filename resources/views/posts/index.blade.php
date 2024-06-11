@extends('layouts.app')
@section('content')
@stack('main')
<div class="container">
  <div class="titlebar">
    <a class="btn btn-secondary float-end mt-3" href="{{ route('posts.create') }}" role="button">Add Post</a>
    <h1>blog post</h1>
  </div>

  <hr>

  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif

    @if (count($posts) > 0)
    @foreach ($posts as $post)
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-2">
              <img class="img-fluid" style="max-width:50%;" src="{{ asset('images/'.$post->image)}}" alt="">
            </div>
            <div class="col-10">
              <h4>{{$post->title}}</h4>
              <p>{{$post->content}}</p>
              <p>{{$post->updated_at}}</p>
            </div>
          </div>
          <hr>
        </div>
      </div>
    @endforeach

    <aside class="sidebar" data-spy="affix"  data-offset-top="100">
        <ul>
            <li>HOME</li>
            <li><a href="{{ route('dashboard') }}">プロフィール</a></li>
            <li>設定</li>
        </ul>
    </aside>
  @else
    <p>No Posts found</p>
  @endif
</div>
@endsection
