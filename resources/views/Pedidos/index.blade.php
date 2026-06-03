<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pedidos</h2>
            <a href="{{ route('pedidos.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase">+ Novo Pedido</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($pedidos as $pedido)
                        <div class="border border-gray-200 p-5 rounded-lg hover:shadow-lg bg-gray-50">
                            <h3 class="font-bold text-xl text-gray-900">Pedido #{{ $pedido->id }}</h3>
                            <p class="text-sm text-gray-600 mt-1"><span class="font-semibold">Cliente:</span> {{ $pedido->cliente->nome ?? 'N/A' }}</p>
                            <p class="text-sm text-gray-600"><span class="font-semibold">Produto:</span> {{ $pedido->produto->nome ?? 'N/A' }}</p>
                            <p class="text-sm text-gray-600"><span class="font-semibold">Quantidade:</span> {{ $pedido->quantidade }}</p>
                            <p class="text-sm text-indigo-600 font-bold mt-2">Total: R$ {{ number_format($pedido->total, 2, ',', '.') }}</p>
                            <p class="text-xs text-gray-500 mt-1">Status: {{ ucfirst($pedido->status) }}</p>

                            <div class="flex items-center justify-end mt-4 pt-3 border-t border-gray-200 space-x-3">
                                <a href="{{ route('pedidos.edit', $pedido->id) }}" class="text-indigo-600 hover:text-indigo-900 text-sm">Editar</a>
                                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" onsubmit="return confirm('Excluir este pedido?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Excluir</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 text-gray-400">Nenhum pedido cadastrado.</div>
                    @endforelse
                </div>
                <div class="mt-6">{{ $pedidos->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>