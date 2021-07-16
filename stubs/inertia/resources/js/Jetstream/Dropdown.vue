<template>
    <b-nav-item-dropdown text="Lang" right :no-caret="true">
        <template #button-content>
            <slot name="trigger"></slot>
        </template>        
        <slot name="content"></slot>
    </b-nav-item-dropdown>
</template>

<script>
    import { BNavItemDropdown } from 'bootstrap-vue'

    export default {
        components: {
            BNavItemDropdown,
        },

        props: {
            id: {
                type: String,
                required: true
            },
        }
    }
</script>
