<template>
    <transition name="fade">
        <div v-if="show">
            <div class="justify-content-center">
                <div class="card" v-bind:class="this.bgColor">
                    <div class="top-border" v-bind:class="this.bgColor + ' darken-2'"></div>
                    <div class="card-content">
                        <i class="material-icons close" v-bind:class="this.bgColor + '-text text-darken-3'" @click="close()">close</i>
                        <span class="white-text pr10">{{ this.message }}</span>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        mounted() {
            this.setColors();
        },
        data() {
            return {
                test: 'test',
                show: true,
                alertType: this.type,
                bgColor: '',
                icon: ''
            }
        },
        props: [
            'message',
            'type'
        ],
        methods: {
            close: function() {
                this.show = false;
            },
            setColors: function() {
                if (this.alertType === 'success') {
                    this.bgColor = 'green';
                    this.icon    = 'check_circle';
                }
                else if (this.alertType === 'warning') {
                    this.bgColor = 'orange';
                    this.icon    = 'warning;'
                }
                else if (this.alertType === 'danger') {
                    this.bgColor = 'red';
                    this.icon    = 'error_outline';
                }
                else if (this.alertType === 'info') {
                    this.bgColor = 'blue';
                    this.icon    = 'info_outline';
                }
                else {
                    this.bgColor = 'grey';
                    this.icon    = 'info_outline';
                }
            },
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
    .container {
        position: relative;
    }
    .close {
        font-size: 1.4em;
        float: right;
        cursor: pointer;
    }
    .top-border {
        height: 4px;
    }
</style>