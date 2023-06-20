@auth
    <x-layout>
        <x-setting heading="Sve kategorije">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg>mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">

                                                @foreach ($categories as $category)

                                                        <tr>
                                                            <td>
                                                                <div class="flex items-center ml-5 p-2">
                                                                    <div class="text-2xl font-medium text-gray-900">
                                                                        {{ $category->name }}
                                                                    </div>

                                                                </div>
                                                            </td>
                                                     <!--       <td class="px-6 py-4 whitespace-nowrap text-right text-xl font-medium">
                                                                <a href="/admin/categories/{{ $category->id }}/edit"
                                                                    class="text-blue-500 hover:text-blue-600">Izmeni</a>
                                                            </td>

                                                            <td class="px-6 py-4 whitespace-nowrap text-right text-xl font-medium">
                                                                <form method="POST" action="/admin/categories/{{ $category->id }}">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button class="text-xl text-gray-500">Obriši</button>
                                                                </form>
                                                            </td> -->
                                                        </tr>

                                                        @if(count($category->childs))

                                                        @include('admin.categories.manageChild',['childs' => $category->childs])

                                                    @endif
                                                @endforeach


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
