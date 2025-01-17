@extends('site.layout.padrao')
@section('titulo', 'Clientes')

@section('conteudo')

    <div>
        <div class="fs-4 fw-bolder text-center">
            <p class="mt-3">Produtos</p>
        </div>

        <div>
            <ul class="d-flex justify-content-end list-unstyled">
                <li class="me-2"><a href="{{route('cliente.create')}}"><button type="button" class="btn btn-primary btn-sm">Cadastrar</button></a></li>
                <li class="me-2"><a href="{{route('site.main')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
            </ul>
        </div>


    </div>











@endsection
