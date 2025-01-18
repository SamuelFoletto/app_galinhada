@extends('site.layout.padrao')
@section('titulo', 'Produtos')


@section('conteudo')
    <div>
        <ul class="d-flex justify-content-end list-unstyled">
            <li class="me-2 mt-2"><a href="{{route('produto.index')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
        </ul>
    </div>
    <div class="w-100 mt-3">
        <div class="d-flex px-4">
            <div class="m-2 w-100 d-flex flex-column align-items-center">
                <h2>Produtos</h2>

                <div class="mb-1" style="width: 500px;">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control w-100" name="nome_produto" value="{{$produto->nome_produto ?? ''}}" disabled>
                    {{$errors->first('nome_produto') ?? ''}}

                </div>
                <div class="mb-1" style="width: 500px;">
                    <label class="form-label">Valor</label>
                    <input type="text" class="form-control w-100" name="valor_produto" value="{{$produto->valor_produto ?? ''}}" disabled>
                    {{$errors->first('valor_produto') ?? ''}}
                </div>
                <div class="mb-1" style="width: 500px;">
                    <label class="form-label">Descrição</label>
                    <input type="text" class="form-control w-100" name="descricao" value="{{$produto->descricao ?? ''}}" disabled>
                    {{$errors->first('descricao') ?? ''}}
                </div>
                <div class="mb-1" style="width: 500px;">
                    <label class="form-label">Peso</label>
                    <input type="text" class="form-control w-100" name="peso" value="{{$produto->peso.'G' ?? ''}}" disabled>
                    {{$errors->first('peso') ?? ''}}
                </div>

            </div>



        </div>

    </div>

@endsection
