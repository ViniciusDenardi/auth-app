<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Post') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- ERROS -->
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('Post.store') }}" enctype="multipart/form-data"> 
                        @csrf 

                        <!-- TITULO -->
                        <div>
                            <label class="block mb-1">Título:</label>
                            <input type="text" name="title" value="{{ old('title') }}" required
                                class="w-full border-gray-300 rounded-md shadow-sm"> 
                        </div>

                        <!-- TEXTO -->
                        <div class="mt-4">
                            <label class="block mb-1">Texto:</label>
                            <textarea name="text" required
                                class="w-full border-gray-300 rounded-md shadow-sm">{{ old('text') }}</textarea>
                        </div>

                        <!-- IMAGEM -->
                        <div class="mt-4">
                            <label class="block mb-1">Imagem do Post:</label>

                            <input type="file" name="image" id="image" accept="image/*"
                                class="block w-full text-sm text-gray-500">

                            <p class="text-sm text-gray-500">PNG, JPG, GIF até 2MB</p>

                            <img id="preview" class="mt-3 max-h-64 rounded hidden">
                        </div>

                        <!-- CATEGORIA -->
                        <div class="mt-4">
                            <label class="block mb-1">Categoria:</label>

                            <select name="categorias_id" required class="w-full border-gray-300 rounded-md">
                                <option value="">Selecione uma categoria</option>

                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ old('categorias_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- BOTÃO -->
                        <div class="mt-4">
                            <button type="submit"
                                class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                                Salvar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const fileInput = document.getElementById('image');
        const preview = document.getElementById('preview');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>