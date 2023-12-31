<x-layout>
    @include('posts._header')

    <main class="max-w-7xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-grid :posts="$posts"/>

            {{ $posts->links() }}
        @else
            <p class="text-center">Nema članaka</p>
        @endif

    </main>

</x-layout>

