import Vue from 'vue';
import VueToast from 'vue-toast-notification';

// Import one of available themes
// import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';

Vue.use(VueToast, {
    position: 'top',
    duration: 10000
});