<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100">
            <x-panel>
                <form method="POST" action="/register">
                    @csrf

                    <h1 class="text-center font-bold text-2xl">Registracija</h1>
                    <x-form.input name="name" title="ime"/>
                    <x-form.input name="username" title="korisničko ime"/>
                    <x-form.input name="email" title="email" type="email"/>
                    <x-form.input name="password" title="lozinka" type="password"/>

                    <x-form.button>Registruj se</x-form.button>

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
