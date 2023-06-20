@props(['post'])

<article
    {{ $attributes->merge(['class' => 'border-opacity-5 ml-2 mr-2 mb-5 transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>

                <div class="col-span-8">
                    <div class="lg:grid lg:grid-cols-2">
                        <!-- lg:flex justify-between mb-6" -->
                        @php
                            $broj = count($post['cat']);
                        @endphp

                        @for ($i = 0; $i < $broj; $i++)
                            @if ($post->showPostCategories($post->id)[$i]['parent_id'] == 0)
                                <h5 class="px-4 py-3 border border-blue-300 rounded-full text-gray-400 text-xl uppercase font-semibold"
                                    style="font-size: 10px">{{ $post->showPostCategories($post->id)[$i]['name'] }}</h5>
                            @else
                                <h5 class="px-4 py-3 border border-blue-300 rounded-full text-blue-300 text-md uppercase font-semibold"
                                    style="font-size: 10px">{{ $post->showPostCategories($post->id)[$i]['name'] }}</h5>
                            @endif
                        @endfor
                    </div>
                </div>
                <div class="mt-4">
                    <h1 class="text-4xl">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xl">
                        Objavljeno <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-2xl mt-2 space-y-4">
                <p>
                    {!! $post->excerpt !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-xl">
                    <a href="/?author={{ $post->author->username }}">
                        <img src="https://i.pravatar.cc/60?u={{ $post->author->id }}" alt="" width="60"
                            height="60" class="rounded-xl">
                    </a>

                    <div class="ml-3">
                        <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $post->slug }}"
                        class="transition-colors duration-300 text-xl font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Detaljnije</a>
                </div>
            </footer>
        </div>
    </div>
</article>
