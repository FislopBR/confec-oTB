<!DOCTYPE html>
<html>
<head>
    <title>Notificação de Alteração</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h2>Alteração no sistema</h2>
    <p>Foi realizada uma <strong>{{ $action }}</strong> no registro de <strong>{{ $modelName }}</strong>.</p>

    @if($action === 'Criado' || $action === 'Atualizado')
        <h3>Dados do registro:</h3>
        <ul>
            @foreach($data as $key => $value)
                <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value ?? 'Não informado' }}</li>
            @endforeach
        </ul>
    @elseif($action === 'Deletado')
        <p>ID do registro removido: <strong>{{ $data['id'] ?? 'desconhecido' }}</strong></p>
    @endif

    <hr>
    <p style="color: #666;">Essa é uma mensagem automática. Por favor, não responda.</p>
</body>
</html>