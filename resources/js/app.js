import Vue from 'vue'
import App from './pages/App.vue'
import router from './router'
import store from './store'

Vue.config.productionTip = false
Vue.config.devtools = false

new Vue({
    el: "#app",
    router: router,
    store: store,
    render: h => h(App)
})