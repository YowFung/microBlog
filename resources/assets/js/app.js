
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});



$(window).scroll(function() {
    var sc = $(window).scrollTop();
    if(sc > 400){
        $(".back-to-top").css("display","block");
    }else{
        $(".back-to-top").css("display","none");
    }
});

$(".back-to-top").click(function() {
    var sc = $(window).scrollTop();
    $('body, html').animate({scrollTop:0}, 500);
});

$(function () {
    $('[data-toggle="popover"]').popover()
});


$('body').click(function(e) {
    if(e.target.type != 'button' &&  e.target.id.substr(0, 7) != 'popover') {
        if ($('.popover').is(':visible')) {
            $('.popover').hide();
        }
    }
});