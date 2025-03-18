@extends('site.layout.padrao')
@section('titulo', 'Produtos')


@section('conteudo')
    <div>
        <ul class="d-flex justify-content-end list-unstyled">
            <li class="me-2 mt-2"><a href="{{route('pedido.index')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
        </ul>
    </div>
    <div class="w-100 mt-2">
        <h2 class="text-center">Pedido</h2>
            <div class=" w-100 d-flex">
                <div>
                    <h3>Dados cliente</h3>
                    <div class="mb-1" style="width: 500px;">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control w-75" name="nome" value="{{$pedidos->cliente->nome ?? ''}}" disabled>
                        {{$errors->first('nome') ?? ''}}
                    </div>
                    <div class="mb-1" style="width: 500px;">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control w-75" name="nome" value="{{$pedidos->cliente->telefone ?? ''}}" disabled>
                        {{$errors->first('nome') ?? ''}}
                    </div>

                </div>

                <div>
                    <h3>Dados Pedido</h3>
                    <div class="mb-1" style="width: 500px;">
                        <label class="form-label">Prato</label>
                        <input type="text" class="form-control w-75" name="prato" value="{{$pedidos->produto->nome_produto ?? ''}}" disabled>
                        {{$errors->first('prato') ?? ''}}
                    </div>
                    <div class="mb-1" style="width: 500px;">
                        <label class="form-label">Valor</label>
                        <input type="text" class="form-control w-75" name="valor_total" value="{{$pedidos->valor_total ?? ''}}" disabled>
                        {{$errors->first('valor_total') ?? ''}}
                    </div>
                    <div class="mb-1" style="width: 500px;">
                        <label class="form-label">Forma de pagamento</label>
                        <input type="text" class="form-control w-75" name="valor_total" value="{{$pedidos->forma_pagamento->nome_forma_pagamento ?? ''}}" disabled>
                        {{$errors->first('valor_total') ?? ''}}
                    </div>
                    <div class="mb-1" style="width: 500px;">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control w-75" name="status" value="{{$pedidos->status ?? ''}}" disabled>
                        {{$errors->first('status') ?? ''}}
                    </div>
                </div>

                <div>
                    <h3>Dados da entrega</h3>
                    <div class="mb-1" style="width: 500px;">
                        <label class="form-label">Endereço Completo</label>
                        <input type="text" class="form-control w-75" name="enderecoCompleto" value="{{$enderecoCompleto}}" disabled>
                        {{$errors->first('status') ?? ''}}
                    </div>
                    <div class="mb-1" style="width: 500px;">
                        <label class="form-label">CEP</label>
                        <input type="text" class="form-control w-75" name="cep" value="{{$pedidos->cliente->cep}}" disabled>
                        {{$errors->first('status') ?? ''}}
                    </div>
                    <div class="mb-1" style="width: 500px;">
                        <label class="form-label">Região</label>
                        <input type="text" class="form-control w-75" name="nome_regiao" value="{{$pedidos->cliente->regiao->nome_regiao ?? ''}}" disabled>
                        {{$errors->first('nome_regiao') ?? ''}}
                    </div>


                </div>



            </div>



        </div>

    </div>

@endsection
