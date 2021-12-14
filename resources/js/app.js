
import { createApp } from 'vue'
import Hello from './components/Hello.vue';




const app = createApp({});
app.component('hello-world', Hello);


app.mount('#app');
require('./bootstrap');