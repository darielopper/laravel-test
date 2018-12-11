
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$axios = require('axios');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('orders', require('./components/Orders.vue'));
Vue.component('modal', require('./components/Modal.vue'));

const app = new Vue({
    el: '#app',
    data: {
      orders: []
    },
    mounted(){
        this.$axios.post('/orders/list').then((json) => {
            this.orders = [];
            for(var i in json.data){
                this.orders.push(json.data[i]);
            }
        })
    },
    computed: {
      total(){
          let result = 0;
          this.orders.forEach(i => result += i.price );
          return '$'+result;
      }
    },
    methods: {
        send_data(model){
            this.$axios.post('/order/store', model).then(json => {
                alert('New order created successfully!!!');
                this.orders.push(json.data.model);
            }).catch(error => {
                console.log(error);
                alert('Some errors was found saving order');
            })
        }
    }
});
