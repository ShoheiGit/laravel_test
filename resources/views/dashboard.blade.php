<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- sidebar -->
    @section('sidebar')
    @include('components.sidebar')
    @stop

    <!-- post button -->
    <div class="post-button">
        <button onclick="location.href='{{ route('post.index') }}'" type="button" class="btn btn-primary">投稿する</button>
    </div>

    <section class="posts">
        @foreach ($post_infos as $post_info)
        <div class="row post" v-for="tweet in tweets" :key="tweet.id">
            <div class="profile">
                <div class="profile_image">
                    <img src="{{ $post_info->profile_image }}" alt="">
                </div>
                <div class="profile_name">
                    <p>{{ $post_info->name }}</p>
                </div>
            </div>
            <div class="content">
                <div class="image">
                    <img class="img-fluid" style="max-width:50%;" src="{{ $post_info->image }}" alt="">
                </div>
                <div class="text">
                    <h4>{{ Str::limit($post_info->title, 50, '(...)' ) }}</h4>
                    <p>{{ Str::limit($post_info->content, 100, '(...)' ) }}</p>
                    <div class="update_date">
                        {{$post_info->updated_at}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <infinite-loading @infinite="fetchTweets"></infinite-loading>
    </section>





</x-app-layout>
