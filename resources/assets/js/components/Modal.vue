<template>
    <div>
        <a class="modal-trigger" :href="'#' + id">
            <slot name="trigger"><span class="waves-effect waves-light btn ">Open</span></slot>
        </a>

        <div :id="id" class="modal">
            <div class="modal-content">
                <a class="modal-close right"><i class="material-icons grey-text">close</i></a>
                <slot name="content"></slot>
            </div>
            <div class="modal-footer">
                <slot name="footer"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    const UUID = require('uuid/v4');

    export default {
        name:  'modal',
        data() {
            return {
                id: UUID()
            }
        },
        computed: {
            openId() {
                return this.$el;
            }
        }
    }
</script>
