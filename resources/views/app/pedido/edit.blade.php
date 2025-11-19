@extends('site.layout.padrao')
@section('titulo', 'Pedidos')


@section('conteudo')
    <div>
        <ul class="d-flex justify-content-end list-unstyled">
            <li class="me-2 mt-2"><a href="{{route('pedido.index')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
        </ul>
    </div>
    <div class="w-100 mt-3">
        @component('app.pedido.components.form_edit', ['pedido' => $pedido, 'clientes' => $clientes, 'produtos' => $produtos, 'forma_pagamento' => $forma_pagamento, 'statusAtual' => $statusAtual, 'enderecoCompleto' => $enderecoCompleto])
        @endcomponent

    </div>

@endsection
