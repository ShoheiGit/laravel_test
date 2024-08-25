<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('mypage') }}
        </h2>
    </x-slot>



    <section class="mypage  m-4">
        @if ($user)
            <div class="myProfile">
            <div class="setting_link">
            </div>
                <div class="myprofile_top">
                    <div class="myprofile_image">
                        <img class="w-1/2 rounded-full w-24 h-24 object-cover" src="{{ asset($user->profile_image) }}" alt="Profile Image">
                    </div>
                    <div class="follow">
                        <p>フォロー: {{ $user->follow }}</p>
                        <p>フォロワー: {{ $user->follower }}</p>
                    </div>
                </div>
                <div class="myprofile_bottom">
                    <h1 class="text-4xl">{{ $user->name }}</h1>
                    <p class="my-3 text-lg">{{ $user->profile_text }}</p>
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
                @foreach ($posts as $post_info)
                    <div class="post sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" v-for="tweet in tweets" :key="tweet.id">
                        <div class="content">
                            @if (Auth::id() === $post_info->user_id)
                                <a href="{{ route('post.show', $post_info->id ) }}" class="flex no-underline">
                            @endif
                                <div class="image w-60">
                                    <img class="img-fluid"  src="{{ asset($post_info->image) }}" alt="">
                                </div>
                                <div class="text m-4  text-black ">
                                    <h4>{{ Str::limit($post_info->title, 50, '(...)' ) }}</h4>
                                    <p>{{ Str::limit($post_info->content, 100, '(...)' ) }}</p>
                                    <div class="update_date">
                                        {{$post_info->updated_at}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </section>


</x-app-layout>
