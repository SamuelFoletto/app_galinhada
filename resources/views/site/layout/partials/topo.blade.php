<nav class="navbar navbar-expand-lg fs-5 d-flex flex-column p-0">
    <div class="container-fluid shadow" style="background-color: #dc560e; height: 120px; ">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('images/logo_frango.jpg')}}" class="rounded" style="width:100px; height: 100px;margin-right: 15px">
        </a>
        <a href="{{route('home')}}" class="text-decoration-none">

            <h1 CLASS="text-white">GALINHADA IN BOX</h1>
        </a>
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
    <div class="w-100"  style="background-color: #ecb822">
        <div id="navbarNav" >
            <ul class="navbar-nav d-flex justify-content-center">
                <li class="nav-item m-1">
                    <a class="nav-link active fw-bolder " href="{{route('cliente.index')}}">CLIENTES </a>
                </li>
                <li class="nav-item m-1">
                    <a class="nav-link active fw-bolder" href="{{route('produto.index')}}">PRODUTOS</a>
                </li>
                <li class="nav-item m-1">
                    <a class="nav-link active fw-bolder" href="{{route('pedido.index')}}">PEDIDOS</a>
                </li>

                <li class="dropdown  m-1">
                    <button class="btn btn-dark dropdown-toggle fw-bolder fs-5" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none; color: #000">
                        CADASTROS
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('forma_pagamento.index')}}">Formas de Pagamento</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</nav>
