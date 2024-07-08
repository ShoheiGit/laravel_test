<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('create') }}
        </h2>
    </x-slot>

    <!-- sidebar -->
    @section('sidebar')
    @include('components.sidebar')
    @stop


    <section class="create_post">
        {{-- バリデーションエラーメッセージ --}}
        <x-error \>
        



        <form action="{{ route('post.store') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            @method('POST')
            <fieldset>
                <div class="form-group">
                    <label for="thumbnail">{{ __('サムネ') }}</label>
                    <input type="file" name="thumbnail" value="{{ old('thumbnail') }}">

                    <label for="title" class="pt-3">{{ __('タイトル') }}</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">

                    <label for="description" class="pt-3">{{ __('コンテンツ') }}</label>
                    <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                <div class="d-flex justify-content-between pt-3">

                <button type="submit" class="btn btn-success">
                    {{ __('POST') }}
                </button>
                </div>
            </fieldset>
        </form>
    </section>



</x-app-layout>
