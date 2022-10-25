@auth()<x-panel>
    <form method="POST" action="/posts/{{ $post->slug }}/comments">
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                 alt=""
                 width="40"
                 height="40"
                 class="rounded-full">

            <h2 class="ml-5">Have something to say?</h2>
        </header>

        <div class="mt-6">
                                <textarea
                                    name="body"
                                    class="w-full text-sm focus:outline-none focus:ring"
                                    cols="10"
                                    rows="5"
                                    placeholder="Quick, think of something to say!"
                                    required>
                                </textarea>

            @error('body')
            <span class="text-xs text-red-500"> {{ $message }} </span>
            @enderror
        </div>

        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
            <x-submit-button>Post</x-submit-button>
        </div>


    </form>
</x-panel>

@else
    <p class="bg-gray-200 p-6 rounded-xl font-semibold">
        <a href="/register" class="hover:underline text-pink-500">Register</a> or <a href="/login" class="hover:underline text-pink-500">Log in</a> to leave a comment.
    </p>

@endauth
