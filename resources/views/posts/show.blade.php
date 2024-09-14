<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>


    <div class="post-detail mx-40">
        <div class="my-3">
            <img class="rounded-full object-cover" style="width:100px; height:100px;" src="{{ asset($user->profile_image) }}" alt="">
            <p class="text-xl">{{ $user->name }}</p>
        </div>
        <div class="content flex-col">
            <div class="image mb-5">
                <img class="object-cover mx-auto w-4/6" style="max-height:300px" src="{{ asset($post->image) }}" alt="">
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
