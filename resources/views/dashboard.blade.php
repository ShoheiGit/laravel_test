<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="postsection  m-4">
        <!-- post button -->
        <div class="post-button">
            <button onclick="location.href='{{ route('post.index') }}'" type="button" class="btn btn-primary">投稿する</button>
        </div>
    
        <!-- posts section -->
        <x-PostSection :posts="$post_infos" />
    </div>


</x-app-layout>
