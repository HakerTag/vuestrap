<template>
    <b-form-invalid-feedback role="alert">
        <strong>{{ message }}</strong>
    </b-form-invalid-feedback>
</template>

<script>
    import { BFormInvalidFeedback } from 'bootstrap-vue'

    export default {
        components: {
            BFormInvalidFeedback
        },

        props: ['message']
    }
</script>
