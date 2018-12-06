<template>
    <div>
        <h1>SSR Test {{ mode }}</h1>
        <vue-form-renderer ref="renderer" @submit="previewSubmit" v-model="formData" :config="config" />
    </div>
</template>

<script>
import { VueFormBuilder, VueFormRenderer } from "@processmaker/vue-form-builder";

export default {
    components: {
        VueFormBuilder,
        VueFormRenderer,
    },
    data() {
        return {
            mode: "testing",
            config: [{"name": "SSRTest", "items": [{"label": "Text Box", "config": {"label": "Test {{ foo }} Here", "fontSize": "1em", "textAlign": "left", "fontWeight": "normal"}, "component": "FormText", "inspector": [{"type": "FormTextArea", "field": "label", "config": {"rows": 5, "label": "Text Content", "helper": "The text to display"}}, {"type": "FormSelect", "field": "fontWeight", "config": {"label": "Font Weight", "helper": "The weight of the text", "options": [{"value": "normal", "content": "Normal"}, {"value": "bold", "content": "Bold"}]}}, {"type": "FormInput", "field": "color", "config": {"label": "Text Color", "helper": "Accepts all HTML colors and hex codes"}}, {"type": "FormSelect", "field": "textAlign", "config": {"label": "Text Alignment", "helper": "The Alignment of the text", "options": [{"value": "center", "content": "Center"}, {"value": "left", "content": "Left"}, {"value": "right", "content": "Right"}, {"value": "justify", "content": "Justify"}]}}, {"type": "FormSelect", "field": "fontSize", "config": {"label": "Font Size", "helper": "The size of the text in em", "options": [{"value": "0.5em", "content": "0.5"}, {"value": "1em", "content": "1"}, {"value": "1.5em", "content": "1.5"}, {"value": "2em", "content": "2"}]}}], "editor-component": "FormText"}, {"label": "Line Input", "config": {"name": "some_input", "type": "text", "label": "My input", "helper": null, "validation": null, "placeholder": null}, "component": "FormInput", "inspector": [{"type": "FormInput", "field": "name", "config": {"name": "Field Name", "label": "Field Name", "helper": "The data name for this field", "validation": "required"}}, {"type": "FormSelect", "field": "type", "config": {"name": "Field Type", "label": "Field Type", "helper": "The type for this field", "options": [{"value": "text", "content": "Text"}, {"value": "password", "content": "Password"}]}}, {"type": "FormInput", "field": "label", "config": {"label": "Field Label", "helper": "The label describes the fields name"}}, {"type": "FormInput", "field": "validation", "config": {"label": "Validation", "helper": "The validation rules needed for this field"}}, {"type": "FormInput", "field": "placeholder", "config": {"label": "Placeholder", "helper": "The placeholder is what is shown in the field when no value is provided yet"}}, {"type": "FormInput", "field": "helper", "config": {"label": "Help Text", "helper": "Help text is meant to provide additional guidance on the field's value"}}], "editor-component": "FormInput"}]}],
            formData: {"foo" : "bar"},
        };
    },
    methods: {
        previewSubmit() {
            console.log("pushed")
        }
    }
}
</script>