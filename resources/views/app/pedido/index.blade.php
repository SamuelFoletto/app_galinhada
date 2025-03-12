@extends('site.layout.padrao')
@section('titulo', 'Clientes')

@section('conteudo')

    <div>
        <div class="fs-4 fw-bolder text-center">
            <p class="mt-3">Pedidos</p>
        </div>

        <div>
            <ul class="d-flex justify-content-end list-unstyled">
                <li class="me-2"><a href="{{route('pedido.create')}}"><button type="button" class="btn btn-primary btn-sm">Cadastrar</button></a></li>
                <li class="me-2"><a href=""><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
            </ul>
        </div>

        <div class="container" style="max-width: 100%;">
            <div class="row">

                <div class="col col-lg-1 fw-bolder">
                    Nº. Pedido
                </div>

                <div class="col col-lg-2 fw-bolder" >
                    Cliente
                </div>

                <div class="col col-lg-2 fw-bolder" >
                    Prato
                </div>

                <div class="col col-lg-1 fw-bolder" >
                    Região
                </div>
                <div class="col col-lg-1 fw-bolder" >
                    Status
                </div>
                <div class="col col-lg-2 fw-bolder" >
                    Data Pedido
                </div>
                <div class="col col-md-auto fw-bolder" >
                </div>
                <div class="col col-md-auto fw-bolder">
                </div>
            </div>
            <hr>

            @foreach ($pedidos as $pedido)
                <div class="row" >
                    <div class="col col-lg-1">
                        {{$pedido->id}}
                    </div>

                    <div class="col col-lg-2 " >
                        {{$pedido->cliente->nome}}
                    </div>

                    <div class="col col-lg-2" >
                        {{$pedido->produto->nome_produto}}
                    </div>

                    <div class="col col-lg-1" >
                        {{$pedido->cliente->regiao->nome_regiao}}
                    </div>

                    <div class="col col-lg-1" >
                        {{$pedido->status}}
                    </div>

                    <div class="col col-lg-2" >
                        {{$pedido->created_at->format('d/m H:i')}}
                    </div>

                    <div class=" col-lg-1">
                        <a href="{{route('pedido.show', $pedido -> id)}}"><button class="btn btn-success fw-bold btn-sm">Visualizar</button></a>
                    </div>
                    <div class=" col-lg-1 ">
                        <a href=""><button class="btn btn-warning fw-bold btn-sm">Editar</button></a>
                    </div>
                </div>
                <hr>

            @endforeach


        </div>

    </div>











@endsection
