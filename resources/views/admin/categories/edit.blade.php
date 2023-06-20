@auth
    <x-layout>
        <x-setting heading="Sve kategorije">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg>mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">

                                        <ul id="tree1" class="m-2">

                                            @foreach($categories as $category)

                                                <li>

                                                    {{ $category->name }}

                                                    @if(count($category->childs))

                                                        @include('admin.categories.manageChild',['childs' => $category->childs])

                                                    @endif

                                                </li>

                                            @endforeach

                                        </ul>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </x-setting>
    </x-layout>
@endauth
<script src="{{ asset('js/treeview.js') }}"></script>
