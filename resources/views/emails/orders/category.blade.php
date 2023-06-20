@component('mail::message')
<h2>Zahtev za dodavanje nove kategorije</h2>

Naziv kategorije: {{ $data['title']}}
<br>
Naziv glavne kategorije: {{ $data['parent']}}

Hvala,<br>
{{ auth()->user()->name}}
<!--{{ config('app.name') }} -->
@endcomponent
