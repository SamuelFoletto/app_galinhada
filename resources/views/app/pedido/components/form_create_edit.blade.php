@if(isset($pedido->id))

    <form action="{{route('pedido.update', ['pedido'=>$pedido->id])}}" method="post" class="w-100 d-flex flex-column">
        @csrf
        @method('PUT')
        @else
            <form action="{{route('pedido.store')}}" method="post" class="w-100 d-flex flex-column">
                @csrf
                @endif
                <div class="d-flex px-4">
                    <div class="m-2 w-50 border-end d-flex flex-column align-items-center">
                        <h2>Dados do Pedido</h2>
                        <div class="mb-1" style="width: 500px;">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control w-100" name="nome" value="{{$cliente->nome ?? ''}}">
                            {{$errors->first('nome') ?? ''}}

                        </div>
                        <div class="mb-1" style="width: 500px;">
                            <label for="exampleInputPassword1" class="form-label">E-mail</label>
                            <input type="email" class="form-control w-100" name="email" value="{{$cliente->email ?? ''}}">
                            {{$errors->first('email') ?? ''}}
                        </div>
                        <div class="mb-1" style="width: 500px;">
                            <label for="exampleInputPassword1" class="form-label">Telefone</label>
                            <input type="text" class="form-control w-100" name="telefone" value="{{$cliente->telefone ?? ''}}">
                            {{$errors->first('telefone') ?? ''}}
                        </div>
                    </div>

                </div>


                <button type="submit" class="btn btn-primary mt-4 w-25 mx-auto">Cadastrar</button>
            </form>
