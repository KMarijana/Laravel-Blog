@props(['name', 'title'])

<label class="block mb-2 uppercase font-bold text-xl text-gray-700"
       for="{{ $name }}">
    {{ ucwords($title) }}
</label>
