<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 tracking-tight leading-tight">
            {{ __('Nossa Confecção') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Alerta de Sucesso --}}
            @if (session('success'))
                <div class="mb-8 p-4 bg-white border border-green-200 rounded-xl flex items-center gap-3 text-green-800 shadow-sm">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-transparent">
                @if($fornecedores->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($fornecedores as $fornecedor)
                            <div class="flex flex-col bg-white border border-gray-200 rounded-2xl hover:shadow-md transition-shadow duration-300 group">
                                <div class="p-6">
                                    <h3 class="font-bold text-lg text-gray-900 mb-4 group-hover:text-black transition-colors">{{ $fornecedor->nome }}</h3>
                                    
                                    <div class="space-y-3">
                                        <p class="text-sm text-gray-600 flex items-center gap-2 truncate">
                                            <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            <span class="truncate">{{ $fornecedor->email }}</span>
                                        </p>
                                        
                                        <p class="text-sm text-gray-600 flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                            <span class="font-medium text-gray-900">{{ $fornecedor->telefone }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    {{-- Estado Vazio --}}
                    <div class="text-center py-20 bg-white border border-gray-200 rounded-2xl">
                        <p class="text-gray-500 text-lg mb-4">Nenhum fornecedor registado.</p>
                        <a href="{{ route('fornecedores.create') }}" class="inline-flex items-center px-6 py-3 bg-gray-900 text-white font-medium rounded-lg hover:bg-black transition-colors">
                            Cadastrar Primeiro Fornecedor
                        </a>
                    </div>
                @endif
            </div>
            
        </div>
    </div>
</x-app-layout>