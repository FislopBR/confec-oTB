<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Novo Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('produtos.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="nome" :value="__('Nome do Produto')" />
                        <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="descricao" :value="__('Descrição')" />
                        <textarea id="descricao" name="descricao" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" required></textarea>
                        <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="preco" :value="__('Preço')" />
                        <x-text-input id="preco" name="preco" type="number" step="0.01" min="0" class="mt-1 block w-full md:w-1/3" placeholder="0.00" required />
                        <x-input-error :messages="$errors->get('preco')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Salvar Produto') }}</x-primary-button>
                        <a href="{{ route('produtos.index') }}" class="text-sm text-gray-600 hover:underline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>