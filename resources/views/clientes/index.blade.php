<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nossa Confecção') }}
            </h2>
            <a href="{{ route('clientes.create') }}"class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                + Novo Cliente
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Mensagem de sucesso --}}
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-r shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($clientes->count())
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($clientes as $cliente)
                                <div x-data="{ openDelete: false }"
                                     class="flex flex-col justify-between border border-gray-200 rounded-lg hover:shadow-lg transition bg-gray-50 relative">
                                    <div class="p-5">
                                        <h3 class="font-bold text-xl text-gray-900 mb-2">{{ $cliente->nome }}</h3>
                                        <p class="text-sm text-gray-600 mb-1">
                                            <span class="font-semibold">CPF:</span> {{ $cliente->cpf }}
                                        </p>
                                        <p class="text-sm text-indigo-600 font-medium flex items-center gap-1">
                                            📞 {{ $cliente->telefone }}
                                        </p>
                                        @if($cliente->email)
                                            <p class="text-sm text-gray-500 mt-2 truncate">
                                                ✉️ {{ $cliente->email }}
                                            </p>
                                        @endif
                                    </div>

                                    {{-- Ações --}}
                                    <div class="flex items-center justify-end gap-4 p-5 pt-0 border-t border-gray-200 mt-2">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}"
                                           class="text-indigo-600 hover:text-indigo-900 text-sm font-semibold transition">
                                            Editar
                                        </a>
                                        <button @click="openDelete = true"
                                                type="button"
                                                class="text-red-500 hover:text-red-700 text-sm font-semibold transition">
                                            Excluir
                                        </button>
                                    </div>

                                    {{-- Modal de confirmação --}}
                                    <div x-show="openDelete"
                                         x-transition:enter="transition ease-out duration-300"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100"
                                         x-transition:leave="transition ease-in duration-200"
                                         x-transition:leave-start="opacity-100"
                                         x-transition:leave-end="opacity-0"
                                         class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50"
                                         style="display: none;"
                                         @click.away="openDelete = false">
                                        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4">
                                            <div class="text-center">
                                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                                                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                    </svg>
                                                </div>
                                                <h3 class="text-lg font-bold text-gray-900">Confirmar Exclusão</h3>
                                                <p class="text-sm text-gray-500 mt-2">
                                                    Deseja realmente excluir <strong>{{ $cliente->nome }}</strong>? Esta ação não pode ser desfeita.
                                                </p>
                                            </div>
                                            <div class="mt-6 flex gap-3">
                                                <button @click="openDelete = false"
                                                        type="button"
                                                        class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 font-medium transition">
                                                    Cancelar
                                                </button>
                                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="flex-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="w-full px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 font-medium transition shadow-sm">
                                                        Sim, Excluir
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-500 text-lg">Nenhum cliente cadastrado ainda.</p>
                            <a href="{{ route('clientes.create') }}"
                               class="inline-block mt-4 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition">
                                Cadastrar primeiro cliente
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>