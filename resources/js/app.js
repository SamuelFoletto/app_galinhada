
import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

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

app.mount('#app');
