import Vue from 'vue'
import App from './App.vue'
import renderVueComponentToString from 'vue-server-renderer/basic'

import FormText from "@processmaker/vue-form-builder/src/components/renderer/form-text.vue";

Vue.component(FormText);
const app = new Vue({
  el: '#app',
  render: h => h(App)
})

// app.use()

renderVueComponentToString(app, (err, html) => {
  if (err) {
    console.log("ERROR!!!!!!", err)
  }
  console.log(html)
})