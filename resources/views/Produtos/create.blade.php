<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Novo Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                
                <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Nome do Produto</label>
                        <input type="text" name="nome" value="{{ old('nome') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                        @error('nome') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">SKU / Código Único</label>
                            <input type="text" name="sku" value="{{ old('sku') }}" placeholder="Ex: CAM-AZ-G" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                            @error('sku') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Preço de Venda (R$)</label>
                            <input type="number" name="preco" step="0.01" value="{{ old('preco') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                            @error('preco') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Quantidade em Estoque</label>
                            <input type="number" name="quantidade" value="{{ old('quantidade', 0) }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                            @error('quantidade') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Local de Armazenamento</label>
                            <input type="text" name="local_armazenamento" value="{{ old('local_armazenamento') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            @error('local_armazenamento') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Categoria</label>
                        <select name="categoria" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                            <option value="">Selecione uma categoria</option>
                            <option value="Camisetas" {{ old('categoria') == 'Camisetas' ? 'selected' : '' }}>Camisetas</option>
                            <option value="Calças" {{ old('categoria') == 'Calças' ? 'selected' : '' }}>Calças</option>
                            <option value="Acessórios" {{ old('categoria') == 'Acessórios' ? 'selected' : '' }}>Acessórios</option>
                            <option value="Outros" {{ old('categoria') == 'Outros' ? 'selected' : '' }}>Outros</option>
                        </select>
                        @error('categoria') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Descrição do Produto</label>
                        <textarea name="descricao" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" rows="3">{{ old('descricao') }}</textarea>
                        @error('descricao') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Imagem do Produto</label>
                        <input type="file" name="imagem" accept="image/*" class="mt-1 block w-full">
                        @error('imagem') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4 gap-3">
                        <a href="{{ route('produtos.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Cancelar</a>
                        <button type="submit" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Salvar Produto
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>