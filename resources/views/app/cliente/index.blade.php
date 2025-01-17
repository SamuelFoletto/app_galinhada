@extends('site.layout.padrao')
@section('titulo', 'Clientes')

@section('conteudo')

    <div>
        <div class="fs-4 fw-bolder text-center">
            <p class="mt-3">Clientes</p>
        </div>

        <div>
            <ul class="d-flex justify-content-end list-unstyled">
                <li class="me-2"><a href="{{route('cliente.create')}}"><button type="button" class="btn btn-primary btn-sm">Cadastrar</button></a></li>
                <li class="me-2"><a href="{{route('site.main')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
            </ul>
        </div>

        <div class="container" style="max-width: 100%;">
            <div class="row">

                <div class="col col-lg-1 fw-bolder">
                    Cód. Cliente
                </div>

                <div class="col col-lg-4 fw-bolder" >
                    Nome
                </div>

                <div class="col col-lg-2 fw-bolder" >
                    E-mail
                </div>

                <div class="col col-lg-3 fw-bolder" >
                    Telefone
                </div>
                <div class="col col-md-auto fw-bolder" >
                </div>
                <div class="col col-md-auto fw-bolder">
                </div>
            </div>
            <hr>
            @foreach($clientes as $cliente)
                <div class="row" >
                    <div class="col col-lg-1">
                        {{$cliente->id}}
                    </div>

                    <div class="col col-lg-4 " >
                        {{$cliente->nome}}
                    </div>

                    <div class="col col-lg-2" >
                        {{$cliente->email}}
                    </div>

                    <div class="col col-lg-3" >
                        {{$cliente->telefone}}
                    </div>
                    <div class=" col-lg-1">
                        <a href="{{route('cliente.show', $cliente->id)}}"><button class="btn btn-success fw-bold btn-sm">Visualizar</button></a>
                    </div>
                    <div class=" col-lg-1 ">
                        <a href="{{route('cliente.edit', $cliente->id)}}"><button class="btn btn-warning fw-bold btn-sm">Editar</button></a>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>

    </div>











@endsection
