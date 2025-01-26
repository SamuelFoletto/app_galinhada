            <form action="{{route('pedido.store')}}" method="post" class="w-100 d-flex" style="border: 1px solid #ccc;">
                @csrf
                <div class="w-50 px-4">
                    <!-- Informar ID ou Nome do Cliente -->
                    <div class="mb-3">
                        <label for="campo-buscar-cliente" class="form-label">ID ou Nome do Cliente</label>
                        <input type="text" id="campo-buscar-cliente" name="buscar_cliente" class="form-control w-50" placeholder="Digite o ID ou Nome do cliente">
                    </div>
                    <button type="button" id="btn-buscar-cliente" class="btn btn-primary mb-3 w-50">Buscar Cliente</button>


                    <div class="mb-3">
                        <label for="cliente-nome" class="form-label">Nome do Cliente</label>
                        <input type="text" id="cliente-nome" name="cliente_nome" class="form-control w-50" readonly>

                        <label for="cliente-endereco" class="form-label">Endereco</label>
                        <input type="text" id="cliente-endereco" name="cliente_endereco" class="form-control w-50" readonly>

                        <label for="cliente-cep" class="form-label">CEP</label>
                        <input type="text" id="cliente-cep" name="cliente_cep" class="form-control w-50" readonly>

                        <label for="cliente-regiao" class="form-label">Região</label>
                        <input type="text" id="cliente-regiao" name="cliente_regiao" class="form-control w-50" readonly>

                        <input type="hidden" id="cliente-id" name="cliente_id">
                    </div>
                </div>

                <div>
                    <div class="mb-3">
                        <label for="produto-nome" class="form-label">Nome do Produto</label>
                        <input type="text" id="produto-nome" name="produto_nome" class="form-control" placeholder="Digite o nome do produto">

                        <label for="produto-quantidade" class="form-label mt-3">Quantidade</label>
                        <input type="number" id="produto-quantidade" name="produto_quantidade" class="form-control" min="1" placeholder="Digite a quantidade">
                    </div>

                    <!-- Botão para Adicionar Produto -->
                    <button type="button" id="btn-adicionar-produto" class="btn btn-success mb-3">Adicionar Produto</button>

                    <!-- Lista de Produtos Adicionados -->
                    <div id="produtos-lista" class="mt-3">
                        <h5>Produtos Adicionados:</h5>
                        <ul id="lista-produtos-ul"></ul> <!-- Lista para exibir produtos -->
                    </div>

                </div>



                    </form>
            <button type="submit" class="btn btn-primary mt-4">Criar Pedido</button>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnBuscarCliente = document.getElementById('btn-buscar-cliente');
            const campoBuscarCliente = document.getElementById('campo-buscar-cliente');
            const clienteNome = document.getElementById('cliente-nome');
            const clienteEndereco = document.getElementById('cliente-endereco');
            const clienteCep = document.getElementById('cliente-cep');
            const clienteRegiao = document.getElementById('cliente-regiao');


            // Evento do botão "Buscar"
            btnBuscarCliente.addEventListener('click', function () {
                const valor = campoBuscarCliente.value.trim(); // Pega o valor do campo

                // Valida se o campo está vazio
                if (!valor) {
                    alert('Por favor, informe um ID ou Nome para buscar o cliente.');
                    return;
                }

                // Verificar se o valor é numérico (ID) ou texto (Nome)
                if (!isNaN(valor)) {
                    // Se for um número, buscar pelo ID
                    buscarClientePorId(valor);
                } else {
                    // Se for texto, buscar pelo Nome
                    buscarClientePorNome(valor);
                }
            });

// Função para buscar cliente pelo ID
            function buscarClientePorId(id) {
                axios.get(`/pedidos/cliente/${id}`)
                    .then(response => {
                        const cliente = response.data;

                        // Concatene o endereço com número, complemento e bairro
                        clienteNome.value = cliente.nome;
                        clienteEndereco.value = `${cliente.endereco}, ${cliente.numero_casa || ''} ${cliente.complemento || ''} - ${cliente.bairro || ''}`.trim();
                        clienteCep.value = cliente.cep;
                        clienteRegiao.value = cliente.nome_regiao;
                    })
                    .catch(error => {
                        // Tratamento de erro
                        if (error.response && error.response.status === 404) {
                            alert('Cliente não encontrado pelo ID informado.');
                        } else {
                            console.error('Erro ao buscar cliente por ID:', error);
                            alert('Ocorreu um erro ao buscar o cliente.');
                        }

                        // Limpar os campos em caso de erro
                        clienteNome.value = '';
                        clienteEndereco.value = '';
                        clienteCep.value = '';
                        clienteRegiao.value = '';
                    });
            }

// Função para buscar cliente pelo Nome
            function buscarClientePorNome(nome) {
                axios.get(`/pedidos/buscar-cliente?nome=${encodeURIComponent(nome)}`)
                    .then(response => {
                        const clientes = response.data;

                        if (clientes.length > 0) {
                            // Caso encontre um cliente, preenchendo apenas o primeiro (ajuste conforme necessidade)
                            const cliente = clientes[0];
                            clienteNome.value = cliente.nome;

                            // Concatenação de endereço completo
                            clienteEndereco.value = `${cliente.endereco}, ${cliente.numero_casa || ''} ${cliente.complemento || ''} - ${cliente.bairro || ''}`.trim();
                            clienteCep.value = cliente.cep;
                            clienteRegiao.value = cliente.nome_regiao;
                        } else {
                            alert('Nenhum cliente encontrado com o nome informado.');
                            clienteNome.value = '';
                            clienteEndereco.value = '';
                            clienteCep.value = '';
                            clienteRegiao.value = '';
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao buscar cliente por nome:', error);
                        alert('Ocorreu um erro ao buscar o cliente.');
                        clienteNome.value = '';
                        clienteEndereco.value = '';
                        clienteCep.value = '';
                        clienteRegiao.value = '';
                    });
            }
        });
    </script>
