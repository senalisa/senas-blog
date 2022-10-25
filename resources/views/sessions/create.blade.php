<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">Log in</h1>

            <form method="POST" action="/sessions" class="mt-10">
                @csrf {{--Expands a hidden input--}}

                {{--EMAIL--}}
                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="email">
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           required>

                    @error('email')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror

                </div>

                {{--PASSWORD--}}
                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password">
                        Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                           required>

                    @error('password')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror

                </div>

                {{--SUBMIT BUTTON--}}
                <div class="mb-6">
                    <x-submit-button>Log in</x-submit-button>
                </div>

            </form>

        </main>
    </section>
</x-layout>
