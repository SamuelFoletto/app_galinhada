@extends('site.layout.padrao')

@section('titulo', 'Clientes')

@section('conteudo')

    <div>
        <div class="fs-4 fw-bolder text-center">
            <p class="mt-3">Clientes</p>
        </div>

        <div class="mb-3 w-50 mx-auto">
            <input type="text" id="searchInput" class="form-control" placeholder="Pesquisar por nome...">
        </div>

        <div>
            <ul class="d-flex justify-content-end list-unstyled">
                <li class="me-2"><a href=""><button type="button" class="btn btn-primary btn-sm">Cadastrar</button></a></li>
                <li class="me-2"><a href="{{route('home')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
            </ul>
        </div>

        <div class="container" style="max-width: 100%;">
            <div class="row">
                <div class="col col-lg-1 fw-bolder">Cód. Cliente</div>
                <div class="col col-lg-3 fw-bolder">Nome</div>
                <div class="col col-lg-2 fw-bolder">E-mail</div>
                <div class="col col-lg-3 fw-bolder">Telefone</div>
                <div class="col col-lg-3 fw-bolder"></div>
                <div class="col col-lg-3 fw-bolder"></div>
                <div class="col col-lg-3 fw-bolder"></div>

            </div>
            <hr>
            <div id="clientList">
                @foreach($clientes as $cliente)
                    <div class="row client-row border-bottom align-items-center p-2">
                        <div class="col col-lg-1">{{$cliente->id}}</div>
                        <div class="col col-lg-3 client-name">{{$cliente->nome}}</div>
                        <div class="col col-lg-2">{{$cliente->email}}</div>
                        <div class="col col-lg-3">{{$cliente->telefone}}</div>
                        <div class="col">
                            <a href="{{route('cliente.show', $cliente->id)}}">
                                <button class="btn btn-success fw-bold btn-sm">Visualizar</button>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('cliente.edit', $cliente->id)}}">
                                <button class="btn btn-warning fw-bold btn-sm">Editar</button>
                            </a>
                        </div>
                        <div class="col">
                            <form action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger fw-bold btn-sm" type="submit">Excluir</button>
                            </form>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                let searchText = $(this).val().toLowerCase();
                $(".client-row").each(function() {
                    let clientName = $(this).find(".client-name").text().toLowerCase();
                    $(this).toggle(clientName.includes(searchText));
                });
            });
        });
    </script>

@endsection
