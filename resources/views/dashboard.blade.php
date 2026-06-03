<x-app-layout>
    <!-- CABEÇALHO (HEADER) -->
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 tracking-tight leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- CONTEÚDO PRINCIPAL -->
    <div class="py-12 bg-gray-50/50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Cartão Minimalista (Removida a sombra, adicionada borda e cantos arredondados) -->
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
                <div class="p-8 sm:p-10 flex flex-col sm:flex-row items-center gap-5 text-gray-900">
                    
                    <!-- Ícone Decorativo (Apenas visual) -->
                    <div class="w-14 h-14 bg-green-50 text-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    
                    <!-- Textos e Funcionalidades (Mantidos intactos) -->
                    <div>
                        <p class="text-xl font-semibold mb-1">
                            {{ __("You're logged in!") }}
                        </p>
                        <p class="text-sm text-gray-500">
                            Bem-vindo(a) ao seu painel de controle. Sua sessão está ativa.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout> 