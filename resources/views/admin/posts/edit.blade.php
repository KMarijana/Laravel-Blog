@auth
    <x-layout>
        <x-setting :heading="'Izmeni članak: ' . $post->title">
            <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="title" title="naslov" :value="old('title', $post->title)" />
                <x-form.input name="slug" title="oznaka" :value="old('slug', $post->slug)" />

                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" title="slika" type="file" :value="old('thumbnail', $post->thumbnail)" />
                    </div>
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration"
                        class="rounded-xl ml-6" width="100">
                </div>

                <x-form.textarea name="excerpt" title="odlomak">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
                <x-form.textarea name="body" title="opis">{{ old('body', $post->body) }}</x-form.textarea>

                <x-form.field>
                    <x-form.label name="category" title="kategorija" />

                    <div class="">
                        @php
                            $categories = \App\Models\Category::all();
                            $posts = \App\Models\Post::showPostCategories($post->id);
                        @endphp

                        <select class="selectpicker" multiple name="cat[]" id="cat">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ in_array($category->id, old('cat') ?: []) ? 'selected' : '' }}>
                                    @if ($category->parent_id == 0)
                                        {{ ucwords($category->name) }}
                                        @else
                                        - {{ ucwords($category->name) }}
                                    @endif

                                </option>
                            @endforeach
                        </select>

                    <x-form.error name="category_id" />
                </x-form.field>
                <br>
                <x-form.button>Objavi</x-form.button>
            </form>
        </x-setting>

    </x-layout>
@endauth
<script>
    $('#cat').prop('title', 'Izaberite');
</script>

