<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <!-- sidebar -->
    @section('sidebar')
    @include('components.sidebar')
    @stop

    <div class="post-detail">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- アラートメッセージ --}}
        @if (session('alertMessage'))
            <div class="alert alert-danger text-center w-25 mx-auto">
                {{ session('alertMessage') }}
            </div>
        @endif


        <form method="POST" action="{{ route('post.update', $post->id) }}"  enctype='multipart/form-data'>
            @csrf
            @method('PATCH')
            <div class="profile">
                <div class="profile_image">
                    <img src="{{ asset($user->profile_image) }}" alt="">
                </div>
                <div class="profile_name">
                    <p>{{ $post->name }}</p>
                </div>
            </div>
            <div class="content">
                <div class="image">
                    <label for="thumbnail">{{ __('サムネ') }}</label>
                    <img class="img-fluid" style="max-width:50%;" src="{{ asset($post->image) }}" alt="">
                    <input type="file" name="thumbnail" value="{{ asset($post->image) }}">
                </div>
                <div class="text">
                    <label for="title" class="pt-3">{{ __('タイトル') }}</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">

                    <label for="description" class="pt-3">{{ __('コンテンツ') }}</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $post->content }}</textarea>
                    <div class="update_date">
                        {{ $post->updated_at }}
                    </div>
                </div>
            </div>
            <input type="submit" value="更新" class="btn btn-primary">
        </form>

        <form method="POST" action="{{ route('post.destroy', $post->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="mt-3 btn btn-danger" onclick='return confirm("本当に削除しますか？")'>削除</button>
        </form>
    </div>
</x-app-layout>
