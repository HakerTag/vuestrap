<template>
    <b-button :type="type" v-on="$listeners" variant="dark">
        <slot></slot>
    </b-button>
</template>

<script>
    import { BButton } from 'bootstrap-vue'

    export default {
        components: {
            BButton
        },
        
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    }
</script>
