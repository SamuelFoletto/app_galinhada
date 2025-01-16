@extends('site.layout.padrao')
@section('titulo', 'BC - Alunos')


@section('conteudo')
    <div>
        <ul class="d-flex justify-content-end list-unstyled">
            <li class="me-2 mt-2"><a href=""><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></li>
        </ul>
    </div>
    <div class="w-100 mt-3">
        <form action="{{route('cliente.store')}}" method="post" class="mx-auto d-flex flex-column align-baseline" style="width: 900px;">
            @csrf
            <legend>Dados pessoais</legend>
            <div class="mb-1" style="width: 500px;">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control w-100" name="nome">
                {{$errors->first('nome') ?? ''}}

            </div>
            <div class="mb-1" style="width: 500px;">
                <label for="exampleInputPassword1" class="form-label">E-mail</label>
                <input type="email" class="form-control w-100" name="email">
                {{$errors->first('email') ?? ''}}
            </div>
            <div class="mb-1" style="width: 500px;">
                <label for="exampleInputPassword1" class="form-label">Telefone</label>
                <input type="text" class="form-control w-100" name="telefone">
                {{$errors->first('telefone') ?? ''}}
            </div>
            <hr class="w-75">
            <legend>Endereço</legend>
            <div class="mb-1" style="width: 500px;">
                <label for="exampleInputPassword1" class="form-label">Rua</label>
                <input type="text" class="form-control w-100" name="endereco">
                {{$errors->first('endereco') ?? ''}}
            </div>
            <div class="mb-1" style="width: 500px;">
                <label for="exampleInputPassword1" class="form-label">Nº</label>
                <input type="number" class="form-control w-100" name="numero_casa">
                {{$errors->first('numero_casa') ?? ''}}
            </div>
            <div class="mb-1" style="width: 500px;">
                <label for="exampleInputPassword1" class="form-label">Complemento</label>
                <input type="text" class="form-control w-100" name="complemento">
                {{$errors->first('complemento') ?? ''}}
            </div>
            <div class="mb-1" style="width: 500px;">
                <label for="exampleInputPassword1" class="form-label">Bairro</label>
                <input type="text" class="form-control w-100" name="bairro">
                {{$errors->first('bairro') ?? ''}}
            </div>
            <div class="mb-1" style="width: 500px;">
                <label for="exampleInputPassword1" class="form-label">CEP</label>
                <input type="text" class="form-control w-100" name="cep">
                {{$errors->first('cep') ?? ''}}
            </div>

            <button type="submit" class="btn btn-primary w-25 mx-auto mt-4">Cadastrar</button>
        </form>

    </div>

@endsection
