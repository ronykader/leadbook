import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import './../node_modules/bulma/css/bulma.css';
import '@/helpers/Toast'

import axios from 'axios'
axios.defaults.baseURL = 'http://leadbook.w3zones.com/api/api'


require('@/store/subscribe')


Vue.config.productionTip = false


// localStorage and reauthenticating 
store.dispatch('auth/attempted', localStorage.getItem('token')).then(() => {

  new Vue({
    router,
    store,
    render: h => h(App)
  }).$mount('#app')
  

})

