<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('mypage') }}
        </h2>
    </x-slot>



    <section class="mypage">
        @if ($user)
            <div class="myProfile">
            <div class="setting_link">
            </div>
                <div class="myprofile_top">
                    <div class="myprofile_image">
                        <img src="{{ asset($user->profile_image) }}" alt="Profile Image">
                    </div>
                    <div class="follow">
                        <p>フォロー: {{ $user->follow }}</p>
                        <p>フォロワー: {{ $user->follower }}</p>
                    </div>
                </div>
                <div class="myprofile_bottom">
                    <h1>{{ $user->name }}</h1>
                    <p>{{ $user->profile_text }}</p>
                    <x-guest-layout>
                        @if (Auth::id() === $user->id )
                            @livewire('profile-modal')
                        @endif
                    </x-guest-layout>
                </div>
            </div>
        @endif

        @if ($posts)
            <div class="myPosts">
                @foreach ($posts as $post)
                    <div>
                        @if (Auth::id() === $post->user_id)
                            <a href="{{ route('post.edit', $post->id) }}">
                        @endif
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->content }}</p>
                        <img src="{{ asset($post->image) }}" alt="Post Image">
                        <p>更新日: {{ $post->updated_at }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

    </section>


</x-app-layout>
