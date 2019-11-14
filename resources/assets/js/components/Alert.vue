<template>
    <transition name="fade">
        <div  v-if="show" class="notification" :class="alertClass">
            <button class="delete" @click="close"></button>
            {{ this.message}}
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            message: {
                type: String,
                required: true
            },
            type: {
                type: String
            }
        },
        data() {
            return {
                show: true,
                alertType: this.type,
            }
        },
        computed: {
            alertClass() {
                return this.alertType ? `is-${this.alertType}` : '';
            }
        },
        methods: {
            close: function() {
                this.show = false;
            }
        }
    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .3s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

</style>
