
import './bootstrap';
import { createApp } from 'vue';
import { createStore } from 'vuex';

const store = createStore({
    state(){
        return {
            item: {},
            transacao: {status: '', mensagem: ''}
        }
    }
})

const app = createApp({});

app.use(store);

import LoginComponent from './components/Login.vue'
app.component('login-component', LoginComponent);

import ClientesComponent from './components/Clientes.vue'
app.component('clientes-component', ClientesComponent);

import CardComponent from './components/Card.vue'
app.component('card-component', CardComponent);

import InputConteinerComponent from './components/InputConteiner.vue'
app.component('input-conteiner-component', InputConteinerComponent)

import TableComponent from './components/Table.vue'
app.component('table-component', TableComponent);

import ModalComponent from './components/Modal.vue'
app.component('modal-component', ModalComponent);

import AlertComponent from './components/Alert.vue'
app.component('alert-component', AlertComponent);

import PaginateComponent from './components/Paginate.vue'
app.component('paginate-component', PaginateComponent);

app.mount('#app');
