<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100">
            <x-panel>
                <h1 class="text-center font-bold text-2xl">Prijava na nalog</h1>
                <form method="POST" action="/login" class="mt-10">
                    @csrf

                    <x-form.input name="email" title="email" type="email"/>
                    <x-form.input name="password" title="lozinka" type="password"/>

                    <x-form.button>Prijavi se</x-form.button>

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
