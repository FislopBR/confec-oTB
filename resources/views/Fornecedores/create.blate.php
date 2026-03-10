<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Novo Fornecedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('fornecedores.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="nome" :value="__('Nome')" />
                        <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="email" :value="__('E-mail')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="telefone" :value="__('Telefone')" />
                            <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="endereco" :value="__('Endereço')" />
                        <textarea id="endereco" name="endereco" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" required></textarea>
                        <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Salvar Fornecedor') }}</x-primary-button>
                        <a href="{{ route('fornecedores.index') }}" class="text-sm text-gray-600 hover:underline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>