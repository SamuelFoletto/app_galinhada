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

                <div class="col col-lg-3 fw-bolder" >
                    Cliente
                </div>

                <div class="col col-lg-2 fw-bolder" >
                    Prato
                </div>

                <div class="col col-lg-3 fw-bolder" >
                    Região
                </div>
                <div class="col col-md-auto fw-bolder" >
                </div>
                <div class="col col-md-auto fw-bolder">
                </div>
            </div>
            <hr>

        </div>

    </div>











@endsection
