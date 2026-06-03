<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detalhes do Cliente') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('clientes.edit', $cliente->id) }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500">
                    Editar
                </a>
                <a href="{{ route('clientes.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400">
                    Voltar
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <div class="border-b pb-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $cliente->nome }}</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <span class="text-sm font-medium text-gray-500">CPF</span>
                            <p class="text-gray-900">{{ $cliente->cpf }}</p>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-500">Telefone</span>
                            <p class="text-gray-900">{{ $cliente->telefone }}</p>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-500">E-mail</span>
                            <p class="text-gray-900">{{ $cliente->email }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <span class="text-sm font-medium text-gray-500">Endereço</span>
                            <p class="text-gray-900">{{ $cliente->endereco ?? 'Não informado' }}</p>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-500">Cadastrado em</span>
                            <p class="text-gray-900">{{ $cliente->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-500">Última atualização</span>
                            <p class="text-gray-900">{{ $cliente->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>