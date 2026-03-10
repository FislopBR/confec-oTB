<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Novo Estoque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('estoques.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="estoque_id" :value="__('ID do estoque')" />
                        <x-text-input id="estoque_id" name="estoque_id" type="number" class="mt-1 block w-full" required />
                        <x-input-error :messages="$errors->get('estoque_id')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="capacidade" :value="__('Capacidade')" />
                            <x-text-input id="capacidade" name="capacidade" type="text" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('capacidade')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="localizacao" :value="__('Localização')" />
                            <x-text-input id="localizacao" name="localizacao" type="text" placeholder="Ex: Corredor A, Prateleira 3" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('localizacao')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Salvar Estoque') }}</x-primary-button>
                        <a href="{{ route('estoques.index') }}" class="text-sm text-gray-600 hover:underline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>