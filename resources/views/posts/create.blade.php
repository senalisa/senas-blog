<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            {{--TITLE--}}
            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="title"
                > Title
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="title"
                       id="title"
                       value="{{ old('title') }}"
                       required
                >

                @error('title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="thumbnail"
                >
                    Thumbnail
                </label>
                <input class="border border-gray-400 p-2 w-full"
                       type="file"
                       name="thumbnail"
                       id="thumbnail"
                       value="{{ old('slug') }}"
                       required
                >

                @error('thumbnail')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>

            {{--SLUG--}}
            {{--                <div class="mb-6">--}}

            {{--                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"--}}
            {{--                           for="slug"--}}
            {{--                    > SLug--}}
            {{--                    </label>--}}

            {{--                    <input class="border border-gray-400 p-2 w-full"--}}
            {{--                           type="text"--}}
            {{--                           name="slug"--}}
            {{--                           id="slug"--}}
            {{--                           value="{{ old('slug') }}"--}}
            {{--                           required--}}
            {{--                    >--}}

            {{--                    @error('title')--}}
            {{--                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>--}}
            {{--                    @enderror--}}

            {{--                </div>--}}

            {{--EXCERPT--}}
            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="excerpt"
                > Excerpt
                </label>

                <textarea class="border border-gray-400 p-2 w-full"
                          name="excerpt"
                          id="excerpt"
                          rows="2"
                          cols="25"
                          required
                >{{ old('excerpt') }}</textarea>

                @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>

            {{--BODY--}}
            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="body"
                > Body
                </label>

                <textarea class="border border-gray-400 p-2 w-full"
                          name="body"
                          id="body"
                          rows="10"
                          cols="50"
                          required
                >{{ old('body') }}</textarea>

                @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>

            {{--CATEGORY--}}
            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="category_id"
                > Category
                </label>

                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : ''}}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                @error('category')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>

            <x-submit-button>Publish!</x-submit-button>

        </form>
    </x-setting>
</x-layout>
