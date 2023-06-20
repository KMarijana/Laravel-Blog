@props(['heading'])

<section class="px-6 py-8 max-w-6xl mx-auto">

    <h1 class="text-2xl font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>


    <div class="flex">
        <aside class="w-52 flex-shrink-0">
            <h4 class="font-semibold mb-2">Linkovi</h4>
            <hr class="mb-4 w-40">
            <ul>
                <li>
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-black' : ''}}">Svi Članci</a>
                </li>

                <li>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-black' : ''}}">Novi Članak</a>
                </li>
                <hr class="mt-2 mb-2 w-40">
                <li>
                    <a href="/admin/categories" class="{{ request()->is('admin/categories') ? 'text-black' : ''}}">Sve Kategorije</a>
                </li>
                @if (auth()->user()->name == 'admin')
                    <li>
                        <a href="/admin/categories/create" class="{{ request()->is('admin/categories/create') ? 'text-black' : ''}}">Nova Kategorija</a>
                    </li>
                    @else
                    <li>
                        <a href="/admin/categories/request" class="{{ request()->is('admin/categories/request') ? 'text-black' : ''}}">Nova Kategorija</a>
                    </li>
                @endif

            </ul>
        </aside>

        <main class="flex-1">
            <x-panel class="bg-gray-50">
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
