@props(['heading'])

<section class="py-8 max-w-7xl mx-auto">

    <h1 class="text-lg font-bold text-xl text-pink-500 mb-8 pb-2 border-b"> {{ $heading }}</h1>

    <div class="flex">
        <aside class="w-80 flex-shrink-0">
            <h4 class="font-semibold mb-4">You can,</h4>
            <li>
                <a href="my-account/{{ auth()->user()->id }}/edit" class="text-pink-500 hover:text-indigo-900">
                    Edit
                </a>
            </li>

            <li>
                    <form method="POST" action="my-account/{{ auth()->user()->id }}">
                        @csrf
                        @method('DELETE')

                        <button class="text-pink-500 hover:text-indigo-900">Delete</button>

                    </form>
            </li>
        </aside>

        <main class="flex-1">
            <x-panel class="mx-auto">
                {{ $slot }}
            </x-panel>
        </main>
    </div>

</section>


