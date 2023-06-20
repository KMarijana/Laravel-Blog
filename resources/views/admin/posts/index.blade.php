@auth
    <x-layout>
        <x-setting heading="Upravljanje člancima">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg>mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($posts as $post)
                                        @if ($post->author->name === auth()->user()->name)
                                            <tr>
                                                <td>
                                                    <div class="flex items-center ml-5">
                                                        <div class="text-2xl font-medium text-gray-900">
                                                            <a href="/posts/{{ $post->slug }}">
                                                                {{ ucfirst($post->title) }}
                                                            </a>
                                                        </div>

                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-right text-xl font-medium">
                                                    <a href="/admin/posts/{{ $post->id }}/edit"
                                                        class="text-blue-500 hover:text-blue-600">Izmeni</a>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-right text-xl font-medium">
                                                    <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="text-xl text-gray-500">Obriši</button>
                                                    </form>
                                                </td>
                                            </tr>
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
