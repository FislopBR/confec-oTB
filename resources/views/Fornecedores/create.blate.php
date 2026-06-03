<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 tracking-tight leading-tight">
            {{ __('Cadastrar Novo Fornecedor') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 overflow-hidden sm:rounded-2xl">
                <div class="p-8 sm:p-10">
                    <form action="{{ route('fornecedores.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Nome --}}
                        <div>
                            <label for="nome" class="block text-sm font-semibold text-gray-700">Nome da Empresa / Fornecedor</label>
                            <input id="nome" name="nome" type="text" value="{{ old('nome') }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-900 focus:ring-gray-900 sm:text-sm transition-colors" required autofocus />
                            @error('nome')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- E-mail e Telefone --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700">E-mail</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-900 focus:ring-gray-900 sm:text-sm transition-colors" required />
                                @error('email')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="telefone" class="block text-sm font-semibold text-gray-700">Telefone</label>
                                <input id="telefone" name="telefone" type="text" value="{{ old('telefone') }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-900 focus:ring-gray-900 sm:text-sm transition-colors" required />
                                @error('telefone')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Endereço --}}
                        <div>
                            <label for="endereco" class="block text-sm font-semibold text-gray-700">Endereço Completo</label>
                            <textarea id="endereco" name="endereco" rows="3" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-900 focus:ring-gray-900 sm:text-sm transition-colors" required>{{ old('endereco') }}</textarea>
                            @error('endereco')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Botões --}}
                        <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100">
                            <a href="{{ route('fornecedores.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors">Cancelar</a>
                            <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-gray-900 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-black focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 transition-all">
                                Salvar Fornecedor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>