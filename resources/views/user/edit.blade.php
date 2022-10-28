<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">Edit Your Info</h1>

            <form method="POST" action="/my-account/{{ auth()->user()->id }}" enctype="multipart/form-data" class="mt-10">
                @csrf
                @method('PATCH')

                {{--NAME--}}
                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="name">
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ old('name', $user->name) }}"
                           required>

                    @error('name')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror

                </div>

                {{--USERNAME--}}
                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="username">
                        Username
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="username"
                           id="username"
                           value="{{ old('username', $user->username) }}"
                           required>

                    @error('username')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror

                </div>

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
                           value="{{ old('email'), $user->email }}"
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
                    <x-submit-button>Update!</x-submit-button>
                </div>

            </form>

        </main>
    </section>
</x-layout>
