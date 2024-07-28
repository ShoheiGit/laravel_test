@props(['posts'])

<section class="posts">
    @foreach ($posts as $post_info)
    <div class="row post" v-for="tweet in tweets" :key="tweet.id">
        <div class="profile">
            <div class="profile_image">
                <a href="{{ route('mypage.index', ['user_id' => $post_info->user_id]) }}">
                    <img src="{{ asset($post_info->profile_image) }}" alt="">
                </a>
            </div>
            <div class="profile_name">
                <p>{{ $post_info->name }}</p>
            </div>
        </div>
        <div class="content">
            <a href="{{ route('post.show', $post_info->id ) }}" class="flex">
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
            </a>
        </div>
    </div>
    @endforeach
    {{-- <infinite-loading @infinite="fetchTweets"></infinite-loading> --}}
</section>
