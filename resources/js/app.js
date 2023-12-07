import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import Client from "./Client.vue";
import Server from "./Server.vue";


const app = createApp({})
app.component('client',Client);
app.component('server',Server);


app.mount("#app")
