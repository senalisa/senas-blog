<x-layout>
    <x-setting :heading="'Edit Post:  ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            {{--TITLE--}}
            <x-form.input name="title" :value="old('title', $post->title)"/>
            {{--THUMBNAIL--}}
            <div class="flex mt-6 ">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>
            {{--EXCERPT--}}
            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            {{--BODY--}}
            <x-form.textarea name="body">{{ old('excerpt', $post->body) }}</x-form.textarea>

            {{--CATEGORY--}}
            <div class="mb-6">
                <x-form.label name="category" />

                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </div>

            <x-submit-button>Post!</x-submit-button>

        </form>
    </x-setting>
</x-layout>
