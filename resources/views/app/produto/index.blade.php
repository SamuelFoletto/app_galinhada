@extends('site.layout.padrao')
@section('titulo', 'Produtos')

@section('conteudo')

    <div>
        <div class="fs-4 fw-bolder text-center">
            <p class="mt-3">Produtos</p>
        </div>

        <div>
            <ul class="d-flex justify-content-end list-unstyled">
                <li class="me-2"><a href="{{route('produto.create')}}"><button type="button" class="btn btn-primary btn-sm">Cadastrar</button></a></li>
                <li class="me-2"><a href="{{route('home')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
            </ul>
        </div>

        <div class="container text-center" style="max-width: 100%;">
            <div class="row">

                <div class="col-4 fw-bolder">
                    Nome do Produto
                </div>

                <div class="col-1 fw-bolder" >
                    Valor
                </div>

                <div class="col-4 fw-bolder" >
                    Descrição
                </div>


            </div>
            <hr>
            @foreach($produtos as $produto)
                <div class="row" >
                    <div class="col-4">
                        {{$produto->nome_produto}}
                    </div>

                    <div class="col-1" >
                        {{$produto->valor_produto}}
                    </div>

                    <div class="col-4" >
                        {{$produto->descricao}}
                    </div>

                        <div class=" col">
                            <a href="{{route('produto.show', $produto->id)}}"><button class="btn btn-success fw-bold btn-sm">Visualizar</button></a>
                        </div>
                        <div class=" col ">
                            <a href="{{route('produto.edit', $produto->id)}}"><button class="btn btn-warning fw-bold btn-sm">Editar</button></a>
                        </div>
                        <div class=" col-lg-1 ">
                            <form action="{{route('produto.destroy', ['produto' => $produto->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger fw-bold btn-sm" type="submit">Excluir</button>
                            </form>
                        </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>











@endsection
