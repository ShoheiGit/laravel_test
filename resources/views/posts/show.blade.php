<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>


    <div class="post-detail">
        <div class="profile">
            <div class="profile_image">
                <img src="{{ asset($user->profile_image) }}" alt="">
            </div>
            <div class="profile_name">
                <p>{{ $post->name }}</p>
            </div>
        </div>
        <div class="content">
            <div class="image">
                <img class="img-fluid" style="max-width:50%;" src="{{ asset($post->image) }}" alt="">
            </div>
            <div class="text">
                <h4>{{ $post->title }}</h4>
                <p>{{ $post->content }}</p>
                <div class="update_date">
                    {{ $post->updated_at }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
