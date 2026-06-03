<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}" id="form-pedido">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Cliente</label>
                            <select name="cliente_id" id="cliente_id" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full" required>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ $pedido->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Produto</label>
                            <select name="produto_id" id="produto_id" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full" required>
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}" data-preco="{{ $produto->preco }}" {{ $pedido->produto_id == $produto->id ? 'selected' : '' }}>{{ $produto->nome }} - R$ {{ number_format($produto->preco, 2, ',', '.') }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Quantidade</label>
                            <input type="number" name="quantidade" id="quantidade" min="1" value="{{ old('quantidade', $pedido->quantidade) }}" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Status</label>
                            <select name="status" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
                                <option value="pendente" {{ $pedido->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                                <option value="pago" {{ $pedido->status == 'pago' ? 'selected' : '' }}>Pago</option>
                                <option value="enviado" {{ $pedido->status == 'enviado' ? 'selected' : '' }}>Enviado</option>
                                <option value="entregue" {{ $pedido->status == 'entregue' ? 'selected' : '' }}>Entregue</option>
                                <option value="cancelado" {{ $pedido->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4 p-3 bg-gray-100 rounded-lg text-right">
                        <span class="font-semibold">Total atual: </span>
                        <span id="total-exibido" class="text-lg font-bold text-green-700">R$ {{ number_format($pedido->total, 2, ',', '.') }}</span>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('pedidos.index') }}" class="mr-4 text-sm text-gray-600 hover:text-gray-900">Cancelar</a>
                        <button type="submit" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Atualizar Pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function calcularTotal() {
            let selectProduto = document.getElementById('produto_id');
            let preco = 0;
            if (selectProduto.selectedIndex > 0) {
                preco = parseFloat(selectProduto.options[selectProduto.selectedIndex].getAttribute('data-preco'));
            }
            let quantidade = parseInt(document.getElementById('quantidade').value) || 0;
            let total = preco * quantidade;
            document.getElementById('total-exibido').innerText = 'R$ ' + total.toFixed(2).replace('.', ',');
        }

        document.getElementById('produto_id').addEventListener('change', calcularTotal);
        document.getElementById('quantidade').addEventListener('input', calcularTotal);
        window.addEventListener('load', calcularTotal);
    </script>
</x-app-layout>