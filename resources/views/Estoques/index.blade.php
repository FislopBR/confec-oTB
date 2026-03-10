<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nossa Confecção</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border-1-4 border-green-500 text-green-700 shadow-sm rounded-r">{{ session('success') }}</div>
        
        @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($estoques as $estoque)
                        <div class="border p-4 rounded shadow-sm">
                            <p class="text-sm text-gray-600">CPF: {{ $estoque->endereço }}</p>
                            <p class="mt-2 text-blue-600 font-bold">R$ {{ $estoque->telefone }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>