@auth
    <x-layout>
        <x-setting heading="Dodaj novi članak">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title" title="naslov" />
                <x-form.input name="slug" title="oznaka" />
                <x-form.input name="thumbnail" type="file" title="slika" />
                <x-form.textarea name="excerpt" title="odlomak" />
                <x-form.textarea name="body" title="opis" />

                <x-form.field>
                    <x-form.label name="category" title="kategorija" />

                    <!--    <select name="category_id">
                            @php
                                $categories = \App\Models\Category::all();
                            @endphp

                            @foreach ($categories as $category)
    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ ucwords($category->name) }}
                                </option>
    @endforeach
                        </select> -->

                    @php
                        $categories = \App\Models\Category::all()->sortBy('parent_id');
                    @endphp

                    <div class="">
                        <select class="selectpicker" multiple name="cat[]">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    @if ($category->parent_id == 0)
                                        {{ ucwords($category->name) }}
                                    @else
                                        @foreach ($categories as $parent)
                                            @if ($parent->id == $category->parent_id)
                                                {{ ucwords($parent->name) }}
                                                - {{ ucwords($category->name) }}
                                            @endif
                                        @endforeach
                                    @endif
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <x-form.error name="cat[]" />
                </x-form.field>

                <x-form.button>Objavi</x-form.button>
            </form>

        </x-setting>
    </x-layout>
@endauth
