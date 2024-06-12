<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('mypage') }}
        </h2>
    </x-slot>


    <!-- sidebar -->
    @section('sidebar')
    @include('components.sidebar')
    @stop  

    <section class="mypage">
        @if ($user)
            <div class="myProfile">
                <div class="myprofile_top">
                    <div class="myprofile_image">
                        <img src="{{ $user->profile_image }}" alt="Profile Image">
                    </div>
                    <div class="follow">
                        <p>フォロー: {{ $user->follow }}</p>
                        <p>フォロワー: {{ $user->follower }}</p>
                    </div>
                </div>
                <div class="myprofile_bottom">
                    <h1>{{ $user->name }}</h1>
                    <p>{{ $user->profile_text }}</p>
                </div>
            </div>
        @endif

        @if ($posts)
            <div class="myPosts">
                @foreach ($posts as $post)
                    <div>
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->content }}</p>
                        <img src="{{ $post->image }}" alt="Post Image">
                        <p>更新日: {{ $post->updated_at }}</p>
                    </div>
                @endforeach
            </div>
        @endif

    </section>
    

</x-app-layout>
