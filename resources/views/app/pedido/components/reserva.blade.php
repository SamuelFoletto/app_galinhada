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
                            <label class="form-label">Selecione um cliente</label>
                            <select name="cliente_id" id="cliente-select" class="form-control">
                                <option value="">Selecione um cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="container">
                            <label for="buscar-cliente">Buscar Cliente:</label>
                            <input type="text" id="buscar-cliente" class="form-control" placeholder="Digite o nome do cliente">
                            <div id="resultado-busca" class="mt-3"></div>
                        </div>

                        <h3>Informações do Cliente</h3>
                        <form action="{{ isset($pedido->id) ? route('pedido.update', $pedido->id) : route('pedido.store') }}" method="POST" class="w-50">
                            @csrf
                            @if(isset($pedido->id))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" id="cliente-nome" name="nome" class="form-control" value="{{ old('nome') }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="cliente-email" name="email" class="form-control" value="{{ old('email') }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" id="cliente-telefone" name="telefone" class="form-control" value="{{ old('telefone') }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" id="cliente-endereco" name="endereco" class="form-control" value="{{ old('endereco') }}" readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar Pedido</button>
                        </form>
                    </div>

                </div>

                </div>


                <button type="submit" class="btn btn-primary mt-4 w-25 mx-auto">Cadastrar</button>
            </form>


    </form>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const selectCliente = document.getElementById("cliente-select");
            const inputNome = document.getElementById("cliente-nome");
            const inputEmail = document.getElementById("cliente-email");
            const inputTelefone = document.getElementById("cliente-telefone");
            const inputEndereco = document.getElementById("cliente-endereco");

            // Evento de mudança no campo "Select" de cliente
            selectCliente.addEventListener("change", function () {
                const clienteId = this.value;

                // Se nenhum cliente for selecionado, limpa os campos
                if (!clienteId) {
                    inputNome.value = "";
                    inputEmail.value = "";
                    inputTelefone.value = "";
                    inputEndereco.value = "";
                    return;
                }

                // Fazendo a chamada para buscar os dados do cliente
                axios.get(`/pedidos/cliente/${clienteId}`)
                    .then(response => {
                        const cliente = response.data;
                        inputNome.value = cliente.nome || "";
                        inputEmail.value = cliente.email || "";
                        inputTelefone.value = cliente.telefone || "";
                        inputEndereco.value = cliente.endereco || ""; // Adapte para o campo correto
                    })
                    .catch(error => {
                        console.error("Erro ao buscar cliente:", error);
                        alert("Não foi possível carregar os dados do cliente.");
                    });
            });
        });

        selectCliente.addEventListener("change", function () {
            const clienteId = this.value;

            if (!clienteId) {
                console.log("Nenhum cliente selecionado!");
                return;
            }

            console.log(`Buscando dados para o ID: ${clienteId}`);

            axios.get(`/pedidos/cliente/${clienteId}`)
                .then(response => {
                    console.log("Dados do cliente recebidos:", response.data);
                })
                .catch(error => {
                    console.error("Erro ao buscar cliente:", error);
                    alert("Não foi possível carregar os dados do cliente.");
                });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const campoBusca = document.getElementById('buscar-cliente');
            const resultadoBusca = document.getElementById('resultado-busca');

            campoBusca.addEventListener('input', function () {
                const nome = campoBusca.value.trim();

                // Se o campo de busca estiver vazio, limpamos os resultados
                if (nome === '') {
                    resultadoBusca.innerHTML = '';
                    return;
                }

                // Fazendo a requisição para buscar clientes pelo nome
                axios.get(`/pedidos/buscar-cliente?nome=${encodeURIComponent(nome)}`)
                    .then(response => {
                        const clientes = response.data;

                        // Exibir os resultados na div
                        if (clientes.length > 0) {
                            resultadoBusca.innerHTML = clientes.map(cliente => `
                        <div class="cliente">
                            <strong>Nome:</strong> ${cliente.nome}<br>
                            <strong>Email:</strong> ${cliente.email}<br>
                            <strong>Telefone:</strong> ${cliente.telefone}<br>
                            <hr>
                        </div>
                    `).join('');
                        } else {
                            resultadoBusca.innerHTML = '<p>Nenhum cliente encontrado.</p>';
                        }
                    })
                    .catch(error => {
                        console.error("Erro ao buscar cliente:", error);
                        resultadoBusca.innerHTML = '<p>Erro ao buscar cliente.</p>';
                    });
            });
        });
    </script>
