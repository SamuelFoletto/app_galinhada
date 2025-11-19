@extends('site.layout.padrao')
@section('titulo', 'Produtos')

@section('conteudo')

    <div>
        <div class="fs-4 fw-bolder text-center">
            <p class="mt-3">Formas de Pagamento</p>
        </div>

        <div>
            <ul class="d-flex justify-content-end list-unstyled">
                <li class="me-2"><a href="{{route('forma_pagamento.create')}}"><button type="button" class="btn btn-primary btn-sm">Cadastrar</button></a></li>
                <li class="me-2"><a href="{{route('home')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
            </ul>
        </div>

        <div class="container text-center" style="max-width: 100%;">
            <div class="row">

                <div class="col-2 fw-bolder">
                    ID
                </div>

                <div class="col-5 fw-bolder" >
                    Forma de Pagamento
                </div>
            </div>
            <hr>
            @foreach($formas_pagamento as $forma_pagamento)
                <div class="row d-flex" >


                        <div class="col-2">
                            {{$forma_pagamento->id}}
                        </div>

                        <div class="col-5">
                            {{$forma_pagamento->nome_forma_pagamento}}
                        </div>







                </div>
                <hr>
            @endforeach

        </div>
    </div>







@endsection
