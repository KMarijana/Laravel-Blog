@auth
<x-layout>
    <x-setting heading="Dodaj novu kategoriju">

        <form role="form" id="category" method="POST" action="{{ route('add.category') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                <label>Naziv:</label>

                <input type="text" id="name" name="name" value="" class="form-control" placeholder="Unesi naziv">
                @if ($errors->has('name'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

            </div>

            @php
                $allCategories = \App\Models\Category::all();
            @endphp

            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">

                <label>Glavna kategorija:</label>
                <select id="parent_id" name="parent_id" class="form-control py-0">
                    <option value="0">Izaberi</option>
                    @foreach($allCategories as $rows)
                        @if ($rows->parent_id == 0)
                            <option value="{{ $rows->id }}">{{ $rows->name }}</option>
                        @endif
                    @endforeach
                </select>

                @if ($errors->has('parent_id'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('parent_id') }}</strong>
                    </span>
                @endif

            </div>

            <x-form.button>Dodaj</x-form.button>

            </form>
    </x-setting>
</x-layout>
@endauth
