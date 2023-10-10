import './bootstrap';
import { createApp } from 'vue';
import Router from './router/index.js';
import App from './App.vue'; 
import axios from 'axios';

axios.defaults.baseURL = 'http://127.0.0.1:8000';

const app = createApp(App);
app.use(Router);
app.config.globalProperties.$axios = axios;
app.mount('#app');