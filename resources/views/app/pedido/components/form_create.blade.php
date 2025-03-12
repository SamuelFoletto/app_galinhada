            <form action="{{route('pedido.store')}}" method="post" class="w-100 d-flex" style="border: 1px solid #ccc;">
                @csrf
                <div class="w-50 px-4">
                    <h3>Dados do cliente</h3>
                    <div class="mb-3">
                        <label for="campo-buscar-cliente" class="form-label">ID ou Nome do Cliente</label>
                        <input type="text" id="campo-buscar-cliente" name="buscar_cliente" class="form-control w-50" placeholder="Digite o ID ou Nome do cliente">
                    </div>
                    <button type="button" id="btn-buscar-cliente" class="btn btn-primary mb-3 w-50">Buscar Cliente</button>


                    <div class="mb-3">
                        <label for="cliente-id" class="form-label">ID</label>
                        <input type="text" id="cliente-id" name="cliente_id" class="form-control w-25" readonly>


                        <label for="cliente-nome" class="form-label">Nome do Cliente</label>
                        <input type="text" id="cliente-nome" name="cliente_nome" class="form-control w-50" readonly>
                        <label for="cliente-endereco" class="form-label">Endereco</label>
                        <input type="text" id="cliente-endereco" name="cliente_endereco" class="form-control w-50" readonly>

                        <label for="cliente-cep" class="form-label">CEP</label>
                        <input type="text" id="cliente-cep" name="cliente_cep" class="form-control w-50" readonly>

                        <label for="cliente-regiao" class="form-label">Região</label>
                        <input type="text" id="cliente-regiao" name="cliente_regiao" class="form-control w-50" readonly>


                    </div>
                </div>

                <div class="w-50 px-4">
                    <h3>Dados do Pedido</h3>
                    <div class="mb-3">
                        <label for="produto-id" class="form-label">Produto</label>
                        <select id="produto-id" name="produto_id" class="form-control">
                            <option value="" data-valor="0">Selecione um produto</option>
                            @foreach($produtos as $produto)
                                <option value="{{ $produto->id }}" data-valor="{{$produto->valor_produto}}">{{ $produto->nome_produto}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="number" id="quantidade" name="quantidade" class="form-control" min="1" value="1">
                    </div>

                    <div class="mb-3">
                        <label for="valor_total" class="form-label">Valor Total</label>
                        <input type="text" id="valor_total" class="form-control" name="valor_total" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Formas de Pagamento</label>
                        <select name="forma_pagamento" class="form-control" >
                            <option>Selecione a forma de pagamentoo</option>
                            @foreach($formasPagamento as $pagamento)
                                <option value="{{ $pagamento->id}}">{{ $pagamento->nome_forma_pagamento}}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="hidden" name="status" value="{{ $statusAtual }}">


                <button type="submit" class="btn btn-primary mt-4 w-100">Criar Pedido</button>
                </div>


            </form>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnBuscarCliente = document.getElementById('btn-buscar-cliente');
            const campoBuscarCliente = document.getElementById('campo-buscar-cliente');
            const clienteId = document.getElementById('cliente-id');
            const clienteNome = document.getElementById('cliente-nome');
            const clienteEndereco = document.getElementById('cliente-endereco');
            const clienteCep = document.getElementById('cliente-cep');
            const clienteRegiao = document.getElementById('cliente-regiao');
            const produtoSelect = document.getElementById('produto-id');
            const quantidadeInput = document.getElementById('quantidade');
            const valorTotalInput = document.getElementById('valor_total');


            //botão de buscar cliente
            btnBuscarCliente.addEventListener('click', function () {
                const valor = campoBuscarCliente.value.trim();

                if (!valor) {
                    alert('Por favor, informe um ID ou Nome para buscar o cliente.');
                    return;
                }

                if (!isNaN(valor)) {
                    buscarClientePorId(valor);
                } else {
                    buscarClientePorNome(valor);
                }
            });

            // Função para buscar cliente pelo ID
            function buscarClientePorId(id) {
                axios.get(`/pedidos/cliente/${id}`)
                    .then(response => {
                        const cliente = response.data;

                        clienteId.value = cliente.id;
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

                        clienteId.value = '';
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

                            const cliente = clientes[0];
                            clienteNome.value = cliente.nome;
                            clienteId.value = cliente.id;
                            clienteEndereco.value = `${cliente.endereco}, ${cliente.numero_casa || ''} ${cliente.complemento || ''} - ${cliente.bairro || ''}`.trim();
                            clienteCep.value = cliente.cep;
                            clienteRegiao.value = cliente.nome_regiao;
                        } else {
                            alert('Nenhum cliente encontrado com o nome informado.');
                            clienteNome.value = '';
                            clienteId.value = '';
                            clienteEndereco.value = '';
                            clienteCep.value = '';
                            clienteRegiao.value = '';
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao buscar cliente por nome:', error);
                        alert('Ocorreu um erro ao buscar o cliente.');
                        clienteNome.value = '';
                        clienteId.value = '';
                        clienteEndereco.value = '';
                        clienteCep.value = '';
                        clienteRegiao.value = '';
                    });
            }

            function atualizarValorTotal() {
                const valorUnitario = parseFloat(produtoSelect.selectedOptions[0].getAttribute('data-valor')) || 0; // Valor do produto selecionado
                const quantidade = parseInt(quantidadeInput.value) || 1; // Quantidade informada

                // Calcula o valor total
                const valorTotal = valorUnitario * quantidade;

                valorTotalInput.value = `${valorTotal.toFixed(2).replace(',', '.')}`;
            }

            produtoSelect.addEventListener('change', atualizarValorTotal);
            quantidadeInput.addEventListener('input', atualizarValorTotal);
            atualizarValorTotal();
        });
    </script>
