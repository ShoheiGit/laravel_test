<x-app-layout>
    <section class="text-gray-600 body-font">
      <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
        <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{ asset($channel->image) }}">
        <div class="text-center lg:w-2/3 w-full">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $channel->channel_name }}</h1>
          <p class="mb-8 leading-relaxed">{{ $channel->discription }}</p>
          <div class="flex justify-center ">
            <form action="{{ route('channelUser.store') }}" method="POST">
            @csrf
              <input type="hidden" name="id" value="{{ $channel->id }}">
              <button type="submit" class="w-3/6 inline-flex justify-center text-white bg-indigo-500  border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">follow</button>
            </form>
          </div>
        </div>
      </div>
    </section>
</x-app-layout>