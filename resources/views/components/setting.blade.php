@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">

    <h1 class="text-lg font-bold text-xl text-pink-500 mb-8 pb-2 border-b"> {{ $heading }}</h1>

    <div class="flex">
        <aside class="w-80">
            <h4 class="font-semibold mb-4">Links</h4>
            <li>
                <a href="/admin/posts/create"
                   class="{{ request()->is('admin/posts/create') ? 'text-pink-500' : ''}}"
                >Dashboard</a>
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
