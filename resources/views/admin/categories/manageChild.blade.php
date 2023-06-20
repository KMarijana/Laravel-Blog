<ul>

    @foreach($childs as $child)

                        <tr>
                            <td>
                                <div class="flex items-center ml-5 p-2">
                                    <div class="text-2xl font-medium text-blue-500">
                                          -  {{ ucwords($child->name) }}
                                    </div>

                                </div>
                            </td>
<!--
                            <td class="px-6 py-4 whitespace-nowrap text-right text-xl font-medium">
                                <a href="/admin/categories/{{ $child->id }}/edit"
                                    class="text-blue-500 hover:text-blue-600">Izmeni</a>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-xl font-medium">
                                <form method="POST" action="/admin/categories/{{ $child->id }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="text-xl text-gray-500">Obriši</button>
                                </form>
                            </td> -->
                        </tr>



    @endforeach

</ul>
