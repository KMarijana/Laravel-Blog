<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 px-5 pl-3 pr-9 text-xl font-semibold w-full lg:w-55 text-left flex lg:inline-flex">
            Kategorija
            <!--  {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Kategorija' }} -->
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 1px;" />
        </button>
    </x-slot>
    <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}" :active="request()->routeIs('home')">
        Sve
    </x-dropdown-item>

    @foreach ($categories->sortBy('parent_id') as $category)
        <x-dropdown-item
            href="/?category={{ $category->name }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="request()->is('/?category={{ $category->name }}')">
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

        </x-dropdown-item>
    @endforeach
</x-dropdown>
