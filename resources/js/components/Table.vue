<template>
    <div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col" v-for="(t, key) in titulos" :key="key">{{t.titulo}}</th>
                <th v-if="visualizar.visivel || atualizar.visivel || remover.visivel">

                </th>
            </tr>

            </thead>

            <tbody>

            <tr v-for="(obj, chave) in dadosFiltrados" :key="chave">
                <td v-for="(valor, chaveValor) in obj" :key="chaveValor">
                    <span v-if="titulos[chaveValor].tipo === 'text'">{{valor}}</span>

                </td>
                <td v-if="visualizar.visivel || atualizar.visivel || remover.visivel">
                    <button v-if="visualizar.visivel" class="btn btn-outline-success btn-sm" :data-bs-toggle="visualizar.dataToggle" :data-bs-target="visualizar.dataTarget" @click="setStore(obj)">Visualizar</button>
                    <button v-if="atualizar.visivel" class="btn btn-outline-primary btn-sm" :data-bs-toggle="atualizar.dataToggle" :data-bs-target="atualizar.dataTarget" @click="setStore(obj)">Editar</button>
                    <button v-if="remover.visivel" class="btn btn-outline-danger btn-sm" :data-bs-toggle="remover.dataToggle" :data-bs-target="remover.dataTarget" @click="setStore(obj)">Remover</button>

                </td>
            </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
export default {
    props: [
        'dados',
        'titulos',
        'visualizar',
        'atualizar',
        'remover'],
    methods:{
        setStore (obj) {
            this.$store.state.item = obj
            this.$store.state.transacao.status = ''
            this.$store.state.transacao.mensagem = ''
        }
    },
    computed: {
        dadosFiltrados(){
            let campos = Object.keys(this.titulos)

            let dadosFiltrados = []
            this.dados.map((item, chave) =>{
                let itemFiltrado = {}

                campos.forEach(campo => {
                    itemFiltrado[campo] = item[campo]
                })

                dadosFiltrados.push(itemFiltrado)
            })

            return dadosFiltrados
        }
    }


}
</script>
