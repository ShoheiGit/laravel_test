@props(['posts'])

<section class="posts">
    @foreach ($posts as $post_info)
    <div class="post sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" v-for="tweet in tweets" :key="tweet.id">
        <div class="profile">
            <div class="profile_image w-20">
                <a href="{{ route('mypage.index', ['user_id' => $post_info->user_id]) }}">
                    <img src="{{ asset($post_info->profile_image) }}" alt="">
                </a>
            </div>
            <div class="profile_name self-center">
                <p class="mb-0">{{ $post_info->name }}</p>
            </div>
        </div>
        <div class="content">
            <a href="{{ route('post.show', $post_info->id ) }}" class="flex no-underline">
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
    {{-- <infinite-loading @infinite="fetchTweets"></infinite-loading> --}}
</section>
