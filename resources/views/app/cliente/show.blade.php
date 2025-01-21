@extends('site.layout.padrao')
@section('titulo', 'Clientes')

@section('conteudo')

    <div>
        <ul class="d-flex justify-content-end list-unstyled">
            <li class="me-2 mt-2"><a href="{{route('cliente.index')}}"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
        </ul>
    </div>
    <div class="w-100 mt-3">
        <div class="d-flex justify-content-between px-4" style="width: 900px;">
            <div class="m-3">
                <h2>Dados pessoais</h2>
                <div class="mb-1" style="width: 500px;">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control w-100" name="nome" value="{{ $cliente->nome }}" disabled>

                </div>
                <div class="mb-1" style="width: 500px;">
                    <label for="exampleInputPassword1" class="form-label">E-mail</label>
                    <input type="email" class="form-control w-100" name="email" value="{{ $cliente->email }}" disabled>

                </div>
                <div class="mb-1" style="width: 500px;">
                    <label for="exampleInputPassword1" class="form-label">Telefone</label>
                    <input type="text" class="form-control w-100" name="telefone" value="{{ $cliente->telefone }}" disabled>

                </div>
            </div>
            <div class="m-3">
                <h2>Endereço</h2>
                <div class="mb-1" style="width: 500px;">
                    <label for="exampleInputPassword1" class="form-label">Rua</label>
                    <input type="text" class="form-control w-100" name="endereco" value="{{ $cliente->endereco }}" disabled>

                </div>
                <div class="mb-1" style="width: 500px;">
                    <label for="exampleInputPassword1" class="form-label">Nº</label>
                    <input type="number" class="form-control w-100" name="numero_casa" value="{{ $cliente->numero_casa }}" disabled>

                </div>
                <div class="mb-1" style="width: 500px;">
                    <label for="exampleInputPassword1" class="form-label">Complemento</label>
                    <input type="text" class="form-control w-100" name="complemento" value="{{ $cliente->complemento }} "disabled>

                </div>
                <div class="mb-1" style="width: 500px;">
                    <label for="exampleInputPassword1" class="form-label">Bairro</label>
                    <input type="text" class="form-control w-100" name="bairro" value="{{ $cliente->bairro }}" disabled>

                </div>
                <div class="mb-1" style="width: 500px;">
                    <label for="exampleInputPassword1" class="form-label">CEP</label>
                    <input type="text" class="form-control w-100" name="cep" value="{{ $cliente->cep }}" disabled>
                </div>
                <div class="mb-1" style="width: 500px;">
                    <label for="exampleInputPassword1" class="form-label">Região</label>
                    <input type="text" class="form-control w-100" name="cep" value="{{ $cliente->regiao->nome_regiao}}" disabled>
                </div>
            </div>


        </div>

    </div>








@endsection
