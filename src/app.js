import Vue from 'vue'
import App from './App.vue'
import renderVueComponentToString from 'vue-server-renderer/basic'
// import { createRenderer } from 'vue-server-renderer'


const app = new Vue({
  el: '#app',
  render: h => h(App)
})

renderVueComponentToString(app, (err, html) => {
  if (err) throw err
  console.log(html)
})