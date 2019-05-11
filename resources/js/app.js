require('./bootstrap')
window.Vue = require('vue')

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default)
Vue.component('register-component', require('./components/RegisterComponent.vue').default)
Vue.component('approbation-modif-note-component', require('./components/ApprobationModifNoteComponent.vue').default)
Vue.component('update-note-component', require('./components/UpdateNoteComponent.vue').default)

const app = new Vue({
    el: '#app'
})
