<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Nome --}}
                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-700 required">Nome Completo</label>
                            <input type="text" name="nome" id="nome"
                                   value="{{ old('nome', $cliente->nome) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   required>
                            @error('nome')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- CPF e Telefone --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                                <input type="text" name="cpf" id="cpf"
                                       value="{{ old('cpf', $cliente->cpf) }}"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       required>
                                @error('cpf')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                                <input type="text" name="telefone" id="telefone"
                                       value="{{ old('telefone', $cliente->telefone) }}"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       required>
                                @error('telefone')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- E-mail --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                            <input type="email" name="email" id="email"
                                   value="{{ old('email', $cliente->email) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   required>
                            @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Endereço (textarea) --}}
                        <div>
                            <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço</label>
                            <textarea name="endereco" id="endereco" rows="2"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('endereco', $cliente->endereco) }}</textarea>
                            @error('endereco')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Botões --}}
                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('clientes.index') }}"
                               class="text-sm text-gray-600 hover:text-gray-900 transition">
                                Cancelar
                            </a>
                            <button type="submit"type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Atualizar Dados
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Máscara para CPF: 000.000.000-00
        var cpfElement = document.getElementById('cpf');
        if (cpfElement) {
            IMask(cpfElement, {
                mask: '000.000.000-00'
            });
        }

        // Máscara para Telefone: (00) 00000-0000 ou (00) 0000-0000 (celular ou fixo)
        var telefoneElement = document.getElementById('telefone');
        if (telefoneElement) {
            IMask(telefoneElement, {
                mask: [{ mask: '(00) 0000-0000' }, { mask: '(00) 00000-0000' }],
                dispatch: function(appended, dynamicMasked) {
                    var number = (dynamicMasked.value + appended).replace(/\D/g, '');
                    if (number.length >= 11) return dynamicMasked.compiledMasks[1];
                    return dynamicMasked.compiledMasks[0];
                }
            });
        }
    });
</script>
</x-app-layout>