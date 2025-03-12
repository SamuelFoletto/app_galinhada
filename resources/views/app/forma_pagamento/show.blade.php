@extends('site.layout.padrao')
@section('titulo', 'Produtos')


@section('conteudo')
    <div>
        <ul class="d-flex justify-content-end list-unstyled">
            <li class="me-2 mt-2"><a href="{{route('forma_pagamento.index')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
        </ul>
    </div>
    <div class="w-100 mt-3">
        <div class="d-flex px-4">
            <div class="m-2 w-100 d-flex flex-column align-items-center">
                <h2>Formas de pagamento</h2>

                <div class="mb-1" style="width: 500px;">
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control w-100" name="id" value="{{$forma_pagamento->id ?? ''}}" disabled>
                    {{$errors->first('id') ?? ''}}

                </div>
                <div class="mb-1" style="width: 500px;">
                    <label class="form-label"></label>
                    <input type="text" class="form-control w-100" name="nome_forma_pagamento" value="{{$forma_pagamento->nome_forma_pagamento ?? ''}}" disabled>
                    {{$errors->first('nome_forma_pagamento') ?? ''}}
                </div>

            </div>



        </div>

    </div>

@endsection
