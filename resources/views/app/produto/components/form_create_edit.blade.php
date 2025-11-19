@if(isset($produto->id))

    <form action="{{route('produto.update', ['produto'=>$produto->id])}}" method="post" class="w-100 d-flex flex-column">
        @csrf
        @method('PUT')
        @else
            <form action="{{route('produto.store')}}" method="post" class="w-100 d-flex flex-column">
                @csrf
                @endif
                <div class="d-flex px-4">
                    <div class="m-2 w-100 d-flex flex-column align-items-center">
                        <h2>Produtos</h2>

                        <div class="mb-1" style="width: 500px;">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control w-100" name="nome_produto" value="{{$produto->nome_produto ?? ''}}">
                            {{$errors->first('nome_produto') ?? ''}}

                        </div>
                        <div class="mb-1 " style="width: 500px;">
                            <label class="form-label">Valor</label>
                            <div class="input-group d-flex">
                                <span class="input-group-text">R$</span>
                                <input type="text" class="form-control" name="valor_produto" value="{{$produto->valor_produto ?? ''}}">
                            </div>
                            {{$errors->first('valor_produto') ?? ''}}
                        </div>
                        <div class="mb-1" style="width: 500px;">
                            <label class="form-label">Descrição</label>
                            <input type="text" class="form-control w-100" name="descricao" value="{{$produto->descricao ?? ''}}">
                            {{$errors->first('descricao') ?? ''}}
                        </div>
                        <div class="mb-1" style="width: 500px;">
                            <label class="form-label">Peso</label>
                            <div class="input-group d-flex">
                                <input type="text" class="form-control " name="peso" value="{{$produto->peso ?? ''}}">
                                <span class="input-group-text">G</span>
                            </div>
                            {{$errors->first('peso') ?? ''}}
                        </div>

                    </div>

                </div>


                <button type="submit" class="btn btn-primary mt-4 w-25 mx-auto">
                    @if(isset($produto->id))
                        Atualizar
                    @else
                        Cadastrar
                    @endif
                </button>
            </form>
