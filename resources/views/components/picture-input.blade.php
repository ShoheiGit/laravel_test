<div class="flex mb4" x-data="picturePreview()">
    <div class="mr-3">
        <img 
            id="preview"
            src="{{ asset(Auth::user()->profile_image) }}"
            alt="プロフィール画像"
            class="w-16 h-16 rounded-full object-cover border-none bg-gray-200">
    </div>
    <div class="flex items-center">
        @csrf
        <button
                x-on:click="document.getElementById('profile_image').click()"
                type="button"
                class="inline-flex items-center uppercase rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            SELECT A NEW PHOTO
        </button>
        <input @change="showPreview(event)" type="file" name="img" id="profile_image" class="hidden">
    </div>
</div>

