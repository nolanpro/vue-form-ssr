<template>
    <div>
        <vue-form-renderer @submit="previewSubmit" v-model="formData" :config="config" />
    </div>
</template>

<script>
import Vue from 'vue'
import { VueFormBuilder, VueFormRenderer} from "@processmaker/vue-form-builder";

// FormText is the only supported component in SRR for now
import FormText from "@processmaker/vue-form-builder/src/components/renderer/form-text.vue";
Vue.component('FormText', FormText);

export default {
    components: {
        VueFormBuilder,
        VueFormRenderer,
    },
    props: ['config', 'formData'],
    data() {
        return {
        };
    },
    methods: {
        previewSubmit() {
            console.log("pushed")
        }
    }
}
</script>