<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>


    <div class="post-detail mx-40">
        <div class="profile my-3">
            <div class="profile_image w-1/3">
                <img class="rounded-full w-24 h-24 object-cover" src="{{ asset($user->profile_image) }}" alt="">
            </div>
            <div class="profile_name">
                <p>{{ $user->name }}</p>
            </div>
        </div>
        <div class="content flex-col">
            <div class="image mb-5">
                <img class="img-fluid mx-auto w-4/6" src="{{ asset($post->image) }}" alt="">
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
