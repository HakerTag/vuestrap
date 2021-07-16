<template>
    <div>
        <li role="presentation" v-if="as == 'button'">
            <button type="submit" @click="$emit('clicked')" role="menuitem" class="dropdown-item">
                <slot></slot>
            </button>
        </li>

        <b-dropdown-item :to="href" v-else>
            <slot></slot>
        </b-dropdown-item>
    </div>
</template>

<script>
    import { BDropdownItem, BDropdownItemButton } from 'bootstrap-vue'

    export default {
        components: {
            BDropdownItem,
            BDropdownItemButton
        },

        props: ['href', 'as']
    }
</script>
