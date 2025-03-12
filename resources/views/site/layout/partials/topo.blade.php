<nav class="navbar navbar-expand-lg fs-5 d-flex flex-column p-0">
    <div class="container-fluid shadow" style="background-color: #ea580c; height: 120px">
        <img src="{{asset('images/logo_frango.jpg')}}" class="rounded" style="width:100px; height: 100px;margin-right: 15px">
        <a class="navbar-brand fs-3 text-light" href="{{route('home')}}">Galinhada In Box</a>

        <ul class="navbar-nav">

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item " href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

    </div>
    <div class="w-100"  style="background-color: #000">
        <div id="navbarNav" >
            <ul class="navbar-nav d-flex justify-content-center">
                <li class="nav-item m-1">
                    <a class="nav-link active text-light" href="{{route('cliente.index')}}">Clientes</a>
                </li>
                <li class="nav-item m-1">
                    <a class="nav-link active text-light" href="{{route('produto.index')}}">Produtos</a>
                </li>
                <li class="nav-item m-1">
                    <a class="nav-link active text-light" href="{{route('pedido.index')}}">Pedidos</a>
                </li>
                <li class="dropdown nav-item mt-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none">
                        Financeiro
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('forma_pagamento.index')}}">Lançamentos</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item mt-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none">
                        Parâmetros
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('forma_pagamento.index')}}">Formas de Pagamento</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</nav>
