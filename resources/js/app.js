/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import swal from 'sweetalert2'
import Multiselect from 'vue-multiselect'
window.swal = swal;

import { Form, HasError, AlertError } from 'vform';
import Dashboard from "./components/Dashboard";
import Profillulusan from "./components/Profillulusan";
import Detailprofillulusan from "./components/Detailprofillulusan";
import Cplprodi from "./components/Cplprodi";
import Kesepadananku from "./components/Kesepadananku";
import Bahankajian from "./components/Bahankajian";
import Kajian from "./components/Kajian";
import Matkul from "./components/Matkul";
import Detailmatkul from "./components/Detailmatkul";
import Pembentukanmatkul from "./components/Pembentukanmatkul";
import Distribusimatkul from "./components/Distribusimatkul";

window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Swal from 'sweetalert2'
window.Swal = Swal

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;

let routes = [
    { path: '/home/dashboard', name:"dashboard", component: Dashboard, props: true},
    { path: '/home/profillulusan', component: Profillulusan },
    { path: '/home/detailprofillulusan', component: Detailprofillulusan },
    { path: '/home/cplprodi', component: Cplprodi },
    { path: '/home/kesepadananku', component: Kesepadananku },
    { path: '/home/bahankajian', component: Bahankajian },
    { path: '/home/kajian', component: Kajian },
    { path: '/home/matkul', component: Matkul },
    { path: '/home/detailmatkul', component: Detailmatkul },
    { path: '/home/pembentukanmatkul', component: Pembentukanmatkul },
    { path: '/home/distribusimatkul', component: Distribusimatkul }
  ]

const router = new VueRouter({
    mode : 'history',
    routes // short for `routes: routes`
  })
  window.Fire =  new Vue();


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
