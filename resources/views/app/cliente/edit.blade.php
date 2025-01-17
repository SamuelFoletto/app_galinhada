@extends('site.layout.padrao')
@section('titulo', 'Galinhada in Box')


@section('conteudo')
    <div>
        <ul class="d-flex justify-content-end list-unstyled">
            <li class="me-2 mt-2"><a href="{{route('cliente.index')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
        </ul>
    </div>
    <div class="w-100 mt-3">
        @component('app.cliente.components.form_create_edit', ['cliente' => $cliente])
        @endcomponent

    </div>

@endsection
