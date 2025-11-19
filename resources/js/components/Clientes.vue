<template>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md">


            <!-- Primeiro card, busca de clientes -->
            <card-component titulo="Clientes">


              <!-- Inserindo dados dentro do card-component -->
              <template v-slot:conteudo>
                <div class="row justify-content-evenly">
                  <!-- Input ID -->
                  <div class="col-2 mb-1">
                    <input-conteiner-component
                    titulo="ID"
                    id="inputId"
                    id-help="idHelp"
                    texto-ajuda="Opcional. Informe o ID do cliente"
                    >
                      <input type="number" class="form-control" id="inputId" aria-describedby="idHelp" placeholder="ID" v-model="busca.id">
                    </input-conteiner-component>
                  </div>

                  <!-- Input Nome-->
                  <div class="col-8 mb-3">
                    <div class="col mb-3">
                      <input-conteiner-component
                      titulo="Nome do cliente"
                      id="inputNome"
                      id-help="nomeHelp"
                      texto-ajuda="Opcional. Nome do cliente">

                        <input type="text" class="form-control" id="inputNome" aria-describedby="nomeHelp" placeholder="Nome do cliente" v-model="busca.nome">

                      </input-conteiner-component>
                    </div>
                  </div>
                </div>
              </template>

              <!-- Rodapé para busca -->
              <template v-slot:rodape>
                <button type="submit" class="btn btn-primary btn-sm float-end" @click="pesquisar"> Pesquisar </button>
              </template>

            </card-component>

            <!-- Segundo card, listagem de clientes -->
            <card-component titulo="Lista de Clientes">

              <!-- Component de listagem -->
                <template v-slot:conteudo>
                    <table-component v-if="clientes.data" :dados="clientes.data" :titulos="{
                                id:{titulo: 'ID', tipo:'text'},
                                nome: {titulo: 'Nome', tipo:'text'},
                            }"
                                     :visualizar="{visivel: true, dataToggle: 'modal', dataTarget: '#modalMarcaVisualizar'}"
                                     :atualizar="{visivel: true, dataToggle: 'modal', dataTarget: '#modalMarcaAtualizar'}"
                                     :remover="{visivel: true, dataToggle: 'modal', dataTarget: '#modalMarcaRemover'}">
                    </table-component>
                </template>

                <template v-slot:rodape>
                    <div class="row">
                        <div class="col-10">

                            <paginate-component>
                                <li v-for="(l, key) in clientes.links" :key="key" class="page-item" @click="paginacao(l)" :class="l.active ? 'page-item active' : 'page-item'">
                                    <a class="page-link" v-html="l.label"></a>
                                </li>
                            </paginate-component>

                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#modalCliente">Adicionar</button>
                        </div>
                    </div>
                </template>

            </card-component>

          </div>

          <!-- Cadastro de cliente -->
          <modal-component id="modalCliente" titulo="Cadastrar Cliente">

              <template v-slot:alertas>
                  <alert-component tipo="success" :detalhes="transacaoDetalhes" titulo="Cliente cadastrado com sucesso!" v-if="transacaoStatus === 'adicionado'"></alert-component>
                  <alert-component tipo="danger" :detalhes="transacaoDetalhes" titulo="Erro ao cadastrar cliente" v-if="transacaoStatus === 'erro'"></alert-component>


              </template>

              <template v-slot:conteudo>
                    <!-- Nome -->
                    <div class="form-group">
                        <input-conteiner-component titulo="Nome" id="novoNome">
                            <input type="text" class="form-control" id="novoNome" placeholder="Nome do cliente" v-model="nomeCliente">
                        </input-conteiner-component>
                    </div>

                    <!-- E-mail -->
                    <div class="form-group">
                        <input-conteiner-component titulo="E-mail" id="emailCliente" >
                            <input type="text" class="form-control" id="emailCliente" placeholder="E-mail do cliente" v-model="emailCliente">
                        </input-conteiner-component>
                    </div>

                    <!-- Telefone -->
                    <div class="form-group">
                        <input-conteiner-component titulo="Telefone" id="telefoneContato">
                            <input type="text" class="form-control" id="telefoneContato" placeholder="Telefone do cliente" v-model="telefoneCliente">
                        </input-conteiner-component>
                    </div>

                    <!-- Endereço -->
                    <div class="form-group">
                        <input-conteiner-component titulo="Endereço" id="enderecoCliente" >
                            <input type="text" class="form-control" id="enderecoCliente" placeholder="Endereço do cliente" v-model="enderecoCliente">
                        </input-conteiner-component>
                    </div>

                    <!-- Numero Casa -->
                    <div class="form-group">
                        <input-conteiner-component titulo="Nº Endereço" id="numeroCasaCliente" >
                            <input type="text" class="form-control" id="numeroCasaCliente" placeholder="Nº Endereço" v-model="numeroCasaCliente">
                        </input-conteiner-component>
                    </div>

                    <!-- Complemento -->
                    <div class="form-group">
                        <input-conteiner-component titulo="Complemento" id="complementoCliente" >
                            <input type="text" class="form-control" id="complementoCliente" placeholder="Complemento" v-model="complementoCliente">
                        </input-conteiner-component>
                    </div>

                    <!-- Bairro -->
                    <div class="form-group">
                        <input-conteiner-component titulo="Bairro" id="bairroCliente" >
                            <input type="text" class="form-control" id="bairroCliente" placeholder="Bairro" v-model="bairroCliente">
                        </input-conteiner-component>
                    </div>

                    <!-- Regiao -->
                    <div class="form-group">
                        <input-conteiner-component titulo="Região" id="regiaoCliente" >
                            <input type="number" class="form-control" id="regiaoCliente"  placeholder="Região" v-model="regiaoCliente">
                        </input-conteiner-component>
                    </div>

                    <!-- CEP -->
                    <div class="form-group">
                        <input-conteiner-component titulo="CEP" id="cepCliente" >
                            <input type="text" class="form-control" id="cepCliente"  placeholder="CEP" v-model="cepCliente">
                        </input-conteiner-component>
                    </div>



                </template>

              <template v-slot:rodape>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" @click="salvar()">Salvar</button>
                </template>

          </modal-component>

          </div>
    </div>
</template>

<script>
export default {
    data()  {
        return {
            nomeCliente: '',
            emailCliente: '',
            telefoneCliente: '',
            enderecoCliente: '',
            numeroCasaCliente: '',
            complementoCliente: '',
            bairroCliente: '',
            regiaoCliente: '',
            cepCliente: '',
            transacaoStatus: '',
            transacaoDetalhes: {},
            urlBase: 'http://127.0.0.1:8000/api/v1/cliente',
            urlPaginacao: '',
            urlFiltro: '',
            clientes: [],
            busca: {id: '', nome: ''},
        }
    },
    methods : {
        carregarLista() {
            let url = this.urlBase + '?' + this.urlPaginacao + this.urlFiltro;
            axios.get(url)
                .then(response => {
                    this.clientes = response.data
                })
                .catch(errors => {
                    console.log(errors)
                })

            console.log(url)
        },

        paginacao(l){
            if(l.url) {
                this.urlPaginacao = l.url.split('?')[1]
                this.carregarLista()
            }
        },

        pesquisar(){
            let filtro = ''
            for(let chave in this.busca){

                if(this.busca[chave]){

                    if (filtro != ''){
                        filtro += ";"
                    }

                    filtro += chave + ':like:' + this.busca[chave]

                }
            }
            if(filtro != '') {
                this.urlPaginacao = 'page=1'
                this.urlFiltro = '&filtro=' + filtro
            } else {
                this.urlFiltro = ''
            }

            this.carregarLista()
        },

        salvar() {
            let data = {
                nome: this.nomeCliente,
                email: this.emailCliente,
                telefone: this.telefoneCliente,
                endereco: this.enderecoCliente,
                numero_casa: this.numeroCasaCliente,
                complemento: this.complementoCliente,
                bairro: this.bairroCliente,
                regiao_id: this.regiaoCliente,
                cep: this.cepCliente
            };

            let config = {
                headers: {
                    'accept': 'application/json',
                    'Authorization': this.token
                }
            };

            axios.post(this.urlBase, data, config)
                .then(response => {
                    this.transacaoStatus = 'adicionado'
                    this.transacaoDetalhes = {
                        mensagem: 'ID do registro: ' + response.data.id
                    }
                    console.log(response)
                })
                .catch(errors => {
                    this.transacaoStatus = 'erro'
                    this.transacaoDetalhes = {
                        mensagem: errors.response.data.message,
                        dados: errors.response.data.errors
                    }

                })
        }
    },
    computed:{
        token(){
            let token = document.cookie.split(';').find(indice => {
                return indice.includes('token=')
            })
            token = token.split('=')[1]
            token = 'Beader ' + token
            console.log(token)
            return token
        }
    },
    mounted() {
        this.carregarLista();
    }
}
</script>
