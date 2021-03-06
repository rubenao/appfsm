/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import VueSweetalert2 from 'vue-sweetalert2';
 import 'sweetalert2/dist/sweetalert2.min.css';

 import { tns } from "../../node_modules/tiny-slider/src/tiny-slider"
require('./bootstrap');

import Vue from 'vue';









window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.use(VueSweetalert2);
Vue.config.ignoredElements = ['trix-editor', 'trix-toolbar'];
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('like-button', require('./components/LikeButton.vue').default);
Vue.component('fecha-receta', require('./components/FechaRutina.vue').default);
Vue.component('eliminar', require('./components/Eliminar.vue').default );
Vue.component('eliminar-entrada', require('./components/EliminarEntrada.vue').default );
Vue.component('eliminar-receta', require('./components/EliminarReceta.vue').default );

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

 /**Carousel con owl */

/**jQuery(document).ready(function() {
    jQuery('.owl-carousel').owlCarousel({
        margin:15,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0 : {
                items: 1
            }, 
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
});*/

$('.like-btn').on('click', function() {
  $(this).toggleClass('like-active');
});

const slider = tns({
    container: '.my-slider',
    items: 1,
    gutter: 15,
    controls: false,
    controlsContainer: false,
    autoplayButtonOutput: false,
    nav: false,
    autoplay: true,
    responsive: {
      0: {
        items: 1
      },
      640: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });

const slider2 = tns({
    container: '.slider',
    items: 4,
    gutter: 15,
    controls: false,
    controlsContainer: false,
    autoplayButtonOutput: false,
    nav: false,
    speed: 400,
    swipeAngle: false,
    mouseDrag: true,
    responsive: {
      0: {
        items: 1
      },
      640: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });

  const slider3 = tns({
    container: '.my-slider3',
    items: 4,
    gutter: 15,
    controls: false,
    controlsContainer: false,
    autoplayButtonOutput: false,
    nav: false,
    speed: 400,
    swipeAngle: false,
    mouseDrag: true,
    responsive: {
      0: {
        items: 1
      },
      640: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });

  const slider4 = tns({
    container: '.my-slider4',
    items: 4,
    gutter: 15,
    controls: false,
    controlsContainer: false,
    autoplayButtonOutput: false,
    nav: false,
    speed: 400,
    swipeAngle: false,
    mouseDrag: true,
    responsive: {
      0: {
        items: 1
      },
      640: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });

  $('.btn').click(function(){
    $(this).toggleClass("click");
    $('.sidebar').toggleClass("show");
    });
    
    
    $('.sidebar ul li a').click(function(){
    var id = $(this).attr('id');
    $('nav ul li ul.item-show-'+id).toggleClass("show");
    $('nav ul li #'+id+' span').toggleClass("rotate");
    
    });
    
    $('nav ul li').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
    });



