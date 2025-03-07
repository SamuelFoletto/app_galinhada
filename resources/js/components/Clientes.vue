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
                      <input type="number" class="form-control" id="inputId" aria-describedby="idHelp" placeholder="ID">
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

                        <input type="text" class="form-control" id="inputNome" aria-describedby="nomeHelp" placeholder="Nome do cliente">

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
                <table-component>

                </table-component>



              </template>




            </card-component>







          </div>






            <div class="container" style="max-width: 100%;">
                <div class="row">

                    <div class="col col-lg-1 fw-bolder">
                        Cód. Cliente
                    </div>


                    <div class="col col-lg-3 fw-bolder" >
                        Nome
                    </div>

                    <div class="col col-lg-2 fw-bolder" >
                        E-mail
                    </div>

                    <div class="col col-lg-3 fw-bolder" >
                        Telefone
                    </div>
                    <div class="col col-md-auto fw-bolder" >
                    </div>
                    <div class="col col-md-auto fw-bolder">
                    </div>
                </div>

                <hr>

                <div class="row" >
                    <div class="col col-lg-1">

                    </div>

                    <div class="col col-lg-3 " >

                    </div>

                    <div class="col col-lg-2" >

                    </div>

                    <div class="col col-lg-3" >

                    </div>
                    <div class=" col-lg-1">
                        <a href=""><button class="btn btn-success fw-bold btn-sm">Visualizar</button></a>
                    </div>
                    <div class=" col-lg-1 ">
                        <a href=""><button class="btn btn-warning fw-bold btn-sm">Editar</button></a>
                    </div>
                    <div class=" col-lg-1 ">
                        <form action="" method="post">

                            <button class="btn btn-danger fw-bold btn-sm" type="submit">Excluir</button>
                        </form>
                    </div>
                </div>
                <hr>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    mounted() {

    }
}
</script>
