import { createApp } from 'vue';
import App from './App.vue';

const appRoot = document.querySelector('#app');

if (appRoot) {
    createApp(App).mount(appRoot);
}
