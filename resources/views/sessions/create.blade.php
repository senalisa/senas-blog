<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 ">
            <x-panel>

                <h1 class="text-center font-bold text-xl">Log in</h1>

                <form method="POST" action="/sessions" class="mt-10">
                    @csrf {{--Expands a hidden input--}}

                    {{--EMAIL--}}
                    <x-form.input name="email" type="email" />
                    {{--PASSWORD--}}
                    <x-form.input name="password" type="password" />


                    {{--SUBMIT BUTTON--}}
                    <div class="mb-6">
                        <x-submit-button>Log in</x-submit-button>
                    </div>

                </form>

            </x-panel>

        </main>
    </section>
</x-layout>
