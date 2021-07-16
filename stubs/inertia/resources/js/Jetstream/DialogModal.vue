<template>
  <b-modal :id="id">
  
    <template #modal-title>
        <slot name="title">
        </slot>
    </template>

    <template #default="{ hide }">
      <slot name="content">
      </slot>
    </template>

    <template #modal-footer="{ ok, cancel, hide }">
      <slot name="footer">
      </slot>
    </template>
  </b-modal>
</template>

<script>
import { BModal, BButton } from 'bootstrap-vue'

export default {
  components: {
    BModal,
    BButton
  },

  props: {
    id: {
      type: String,
      required: true
    }
  }
}
</script>
