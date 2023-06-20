@auth
    <x-panel>
        <form method="POST" action="/posts/{{$post->slug}}/comments">
            @csrf

            <header class="flex items-center mb-4">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id()}}" alt="" width="40" height="40"
                     class="rounded-full">
                <h4 class="ml-4">Ostavite komentar</h4>
            </header>

            <x-form.textarea name="body" title="opis"/>

            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                <x-form.button>Objavi</x-form.button>
            </div>
        </form>
    </x-panel>

@else
    <p class="font-semibold">
        <a href="/register" class="text-blue-700 hover:underline">Registrujte se</a> ili <a href="/login" class="text-blue-700 hover:underline">Ulogujte </a>
        da bi ste ostavili komentar.
    </p>
@endauth
