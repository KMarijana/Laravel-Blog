@props(['post'])

<article
    class="bg-gray-50 border border-black border-opacity-0 transition-colors duration-300 hover:border-opacity-10 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">


                <x-categories-button :post="$post"/>

                <div class="mt-4">
                    <h1 class="text-4xl">
                        <a href="/posts/{{$post->slug}}">
                            {{ $post->title }}
                        </a>
                    </h1>
                    <span class="mt-2 block text-gray-400 text-xl">
                                        Objavljeno <time>{{$post->created_at->diffForHumans()}}</time>
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
                    <a href="/?author={{$post->author->username}}">
                        <img src="https://i.pravatar.cc/60?u={{$post->author->id}}" alt="" width="60" height="60" class="rounded-xl">
                    </a>

                    <div class="ml-3">
                        <a href="/?author={{$post->author->username}}">{{$post->author->name}}</a>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/posts/{{$post->slug}}"
                       class="transition-colors duration-300 text-xl font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Detaljnije</a>
                </div>
            </footer>
        </div>
    </div>
</article>
