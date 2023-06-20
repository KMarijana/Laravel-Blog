@if(session()->has('success'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 5000)"
         x-show="show"
         class="fixed bg-blue-500 text-white mt-2 mb-0 py-2 px-4 rounded-xl bottom-3 right-3 text-xl" style="height: 35px;">
        <p>{{ session('success') }}</p>
    </div>
@endif
