@extends('site.layout.padrao')
@section('titulo', 'Produtos')


@section('conteudo')
    <div>
        <ul class="d-flex justify-content-end list-unstyled">
            <li class="me-2 mt-2"><a href="{{route('forma_pagamento.index')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
        </ul>
    </div>
    <div class="w-100 mt-3">
        @component('app.forma_pagamento.components.form_create_edit', ['forma_pagamento' => $forma_pagamento])

        @endcomponent

    </div>

@endsection
