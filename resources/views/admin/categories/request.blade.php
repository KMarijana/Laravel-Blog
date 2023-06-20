@auth
<x-layout>
    <x-setting heading="Zatraži dodavanje nove kategorije">

        <form method="GET" action="/send-mail">
            @csrf

            <x-form.input name="title" title="Naziv kategorije" />
            <x-form.input name="parent" title="Naziv glavne kategorije" />
            <x-form.button>Pošalji zahtev</x-form.button>
        </form>
    </x-setting>
</x-layout>
@endauth
