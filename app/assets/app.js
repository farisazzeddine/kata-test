/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)



import { createApp } from 'vue'; 
import './styles/app.css'; 
import App from './js/App.vue';
import NavBar from './js/components/NavBar.vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-icons/font/bootstrap-icons.css'
const app = createApp(App);
app.component('navbar', NavBar); 
app.mount('#vue-app');

