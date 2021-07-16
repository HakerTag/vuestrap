<template>
    <b-form-input :value="value" v-on="$listeners" @input="$emit('input', $event)" ref="input" />
</template>

<script>
    import { BFormInput } from 'bootstrap-vue'

    export default {
        components: {
            BFormInput
        },

        props: ['value', 'state', 'classes'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

