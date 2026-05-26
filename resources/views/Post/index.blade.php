<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Botão -->
                    <a href="{{ route('Post.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-xs font-semibold uppercase rounded-md hover:bg-gray-700 mb-6">
                        ➕ Adicione um novo Post
                    </a>

                    @foreach($posts as $post)
                        <div class="py-2">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">

                                    <!-- Imagem -->
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" class="w-full max-h-96 object-cover rounded-lg mb-4">
                                    @else
                                        <div class="w-full h-64 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                                            <span class="text-gray-500">Sem imagem</span>
                                        </div>
                                    @endif

                                    <!-- Header -->
                                    <div class="h-24 bg-gradient-to-r from-blue-500 to-purple-600 flex items-end justify-between p-4">
                                        <h3 class="text-3xl font-bold text-white">
                                            {{ $post->title }}
                                        </h3>

                                        <div class="flex gap-2">
                                            <a href="{{ route('Post.edit', $post) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg">
                                                Editar
                                            </a>

                                            <form action="{{ route('Post.destroy', $post) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg">Deletar</button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Categoria -->
                                    <div class="mb-3 mt-2">
                                        <span class="px-3 py-1 text-xs text-white bg-blue-600 rounded-full">
                                            @foreach ($categorias as $categoria)
                                                @if($categoria->id == $post->categorias_id)
                                                    {{ $categoria->name }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </div>

                                    <!-- Texto -->
                                    <p class="text-lg text-gray-700 dark:text-gray-300">
                                        {{ $post->text }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>