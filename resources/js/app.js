import './bootstrap';
import { createApp } from 'vue';
import Router from './router/index.js';
import App from './App.vue'; // Import the root component

const app = createApp(App); // Use the root component
app.use(Router);
app.mount('#app');