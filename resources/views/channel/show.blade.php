<x-app-layout>
    <section class="text-gray-600 body-font sm:p-8">
    @if (session('message'))
      <div class="alert alert-success w-full">
          {{ session('message') }}
      </div>
    @endif


      <a href="{{ route('channel.edit', ['channel' => $channel->id]) }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
          <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
          <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
        </svg>
      </a>
      <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
        <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{ asset($channel->image) }}">
        <div class="text-center lg:w-2/3 w-full">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $channel->channel_name }}</h1>
          <p class="mb-8 leading-relaxed">{{ $channel->discription }}</p>
          <div class="flex justify-center ">
          <form id="followForm" action="{{ route('channelUser.store') }}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $channel->id }}">
              <button id="followButton" type="submit" class="w-3/6 inline-flex justify-center text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                  @if(Auth::user()->isFollowing($channel)) 
                      Unfollow
                  @else
                      Follow
                  @endif
              </button>
          </form>
          </div>
        </div>
      </div>

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
    </section>
</x-app-layout>