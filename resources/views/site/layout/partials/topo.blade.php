<nav class="navbar navbar-expand-lg fs-5 d-flex flex-column p-0">
    <div class="container-fluid shadow" style="background-color: #ea580c; height: 120px">
        <img src="{{asset('images/logo_frango.jpg')}}" class="rounded" style="width:100px; height: 100px;margin-right: 15px">
        <a class="navbar-brand fs-3 text-light" href="{{route('home')}}">Galinhada In Box</a>

        <ul class="navbar-nav">

            <li class="nav-item">
                <a id="navbarDropdown" class="nav-link text-light">
                    {{ Auth::user()->name }}
                </a>
            </li>
        </ul>

    </div>
    <div class="w-100"  style="background-color: #fcba66">
        <div id="navbarNav" >
            <ul class="navbar-nav d-flex justify-content-center fw-bolder">
                <li class="nav-item m-1">
                    <a class="nav-link active text-light" href="{{route('cliente.index')}}">Clientes</a>
                </li>
                <li class="nav-item m-1">
                    <a class="nav-link active text-light" href="{{route('produto.index')}}">Produtos</a>
                </li>
                <li class="nav-item m-1">
                    <a class="nav-link active text-light" href="{{route('pedido.index')}}">Pedidos</a>
                </li>
            </ul>
        </div>
    </div>

</nav>
