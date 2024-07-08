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

    <!-- posts section -->
    <x-PostSection :posts="$post_infos" />


</x-app-layout>
