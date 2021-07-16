<template>
    <b-dropdown-header>
        <slot></slot>
    </b-dropdown-header>
</template>

<script>
    import { BDropdownHeader } from 'bootstrap-vue'

    export default {
        components: {
            BDropdownHeader
        }
    }
</script>
