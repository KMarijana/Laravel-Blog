@props(['post'])

<div class="col-span-8 px-20 py-2">
    <div class=" px-5 lg:flex justify-between mb-6">
        <!-- hidden -->
        @php
            $broj = count($post['cat']);
        @endphp

        @for ($i = 0; $i < $broj; $i++)
            @if ($post->showPostCategories($post->id)[$i]['parent_id'] == 0)
                <h5 class="px-4 py-3 border border-blue-300 rounded-full text-gray-400 text-xl uppercase font-semibold"
                    style="font-size: 10px">{{ $post->showPostCategories($post->id)[$i]['name'] }}</h5>
            @else
                <h5 class="px-4 py-3 border border-blue-300 rounded-full text-blue-300 text-xl uppercase font-semibold"
                    style="font-size: 10px">{{ $post->showPostCategories($post->id)[$i]['name'] }}</h5>
            @endif
        @endfor
    </div>
</div>
