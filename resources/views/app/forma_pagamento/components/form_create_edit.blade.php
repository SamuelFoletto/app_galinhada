@if(isset($forma_pagamento->id))

    <form action="{{route('forma_pagamento.update', ['forma_pagamento'=>$forma_pagamento->id])}}" method="post" class="w-100 d-flex flex-column">
        @csrf
        @method('PUT')
        @else
            <form action="{{route('forma_pagamento.store')}}" method="post" class="w-100 d-flex flex-column">
                @csrf
                @endif
                <div class="d-flex px-4">
                    <div class="m-2 w-100 d-flex flex-column align-items-center">
                        <h2>Formas de Pagamento</h2>

                        <div class="mb-1" style="width: 500px;">
                            <label class="form-label"></label>
                            <input type="text" class="form-control w-100" name="nome_forma_pagamento" placeholder="Informe a forma de pagamento" value="{{$forma_pagamento->nome_forma_pagamento ?? ''}}">
                            {{$errors->first('nome_forma_pagamento') ?? ''}}
                        </div>

                    </div>

                </div>

                @if(isset($forma_pagamento->id))
                    <button type="submit" class="btn btn-primary mt-4 w-25 mx-auto">Atualizar</button>
                @else
                    <button type="submit" class="btn btn-primary mt-4 w-25 mx-auto">Cadastrar</button>

                @endif
            </form>
