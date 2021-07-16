<template>
    <b-alert variant="danger" class="text-sm p-2" role="alert" :show="hasErrors">
        <div class="font-weight-bold">Whoops! Something went wrong.</div>

        <ul>
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </b-alert>
</template>

<script>
    import { BAlert } from 'bootstrap-vue'

    export default {
        components: {
            BAlert
        },

        computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        }
    }
</script>
