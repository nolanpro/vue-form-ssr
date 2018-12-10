import Vue from 'vue'
import App from './App.vue'
import { createRenderer } from 'vue-server-renderer'

const renderer = createRenderer({
  template: require('fs').readFileSync('./src/template.html', 'utf-8')
})

// This shouldn't have to be here.
import * as VueDeepSet from 'vue-deepset'
Vue.use(VueDeepSet);

if (typeof context == 'undefined') {
  throw new Error(
    "Global context is not defined. " +
    "Are you running this using the spatie/server-side-rendering package?"
  )
}

const app = new Vue({
  el: '#app',
  
  render: h => h(App, {
    props: {
      config: context.config,
      formData: context.data
    },
  })
})

// renderVueComponentToString(app, (err, html) => {
renderer.renderToString(app, (err, html) => {
  if (err) {
    throw err
  }
  console.log(html)
})