import Vue from 'vue'
import App from './App.vue'
import renderVueComponentToString from 'vue-server-renderer/basic'
import FormText from "@processmaker/vue-form-builder/src/components/renderer/form-text";
import FormMultiColumn from "@processmaker/vue-form-builder/src/components/renderer/form-multi-column";
import FormRecordList from "@processmaker/vue-form-builder/src/components/renderer/form-record-list";
Vue.component(FormText);
Vue.component(FormMultiColumn);
Vue.component(FormRecordList);

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
    }
  })
})

renderVueComponentToString(app, (err, html) => {
  if (err) {
    throw err
  }
  console.log(html)
})