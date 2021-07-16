<template>
    <b-form-checkbox :value="value" v-bind:checked="checked" v-on:change="$emit('change', $event)">
      <slot></slot>
    </b-form-checkbox>
</template>

<script>
import { BFormCheckbox } from 'bootstrap-vue'

export default {
    components: {
        BFormCheckbox
    },

    model: {
        prop: 'checked',
        event: 'change'
    },

    props: {
        checked: {
            type: [Array, Boolean],
            default: false,
        },
        value: {},
    },
}
</script>