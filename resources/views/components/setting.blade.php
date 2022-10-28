@props(['heading'])

<section class="py-8 max-w-7xl mx-auto">

    <h1 class="text-lg font-bold text-xl text-pink-500 mb-8 pb-2 border-b"> {{ $heading }}</h1>

    <div class="flex">
        <aside class="w-80 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>
            <li>
                <a href="/admin/posts"
                   class="{{ request()->is('admin/posts') ? 'text-pink-500' : ''}}"
                >All Posts</a>
            </li>

            <li>
                <a href="/admin/posts/create"
                   class="{{ request()->is('admin/posts/create') ? 'text-pink-500' : ''}}"
                >New Post</a>
            </li>
        </aside>

        <main class="flex-1">
            <x-panel class="mx-auto">
                {{ $slot }}
            </x-panel>
        </main>
    </div>

</section>
