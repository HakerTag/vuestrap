<template>
  <b-modal :id="id" hide-header>  
    <template #default="{ hide }">
        <div class="d-flex justify-content-start">
            <div class="mr-3">
                <div class="bg-warning p-2 rounded-circle">
                    <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" width="24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
            </div>
            <div>
                <h5 class="font-weight-bold">
                    <slot name="title">
                    </slot>
                </h5>
                <slot name="content">
                </slot>
            </div>
        </div>
    </template>

    <template #modal-footer="{ ok, cancel, hide }">
      <slot name="footer">
      </slot>
    </template>
  </b-modal>
</template>

<script>
    export default {
        props: {
            id: {
                type: String,
                required: true
            }
        }
    }
</script>
