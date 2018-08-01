<template>
    <form v-bind:action="deleteRoute" v-bind:id="'delete-form-' + this.itemId" method="POST" class="d-inline">
        <input type="hidden" name="_token" v-bind:value="csrfToken" />
        <input type="hidden" name="_method" value="DELETE" />
        <i class="material-icons red-text pl5 delete-btn pointer" @click="confirmDelete()">delete</i>
        <div v-show="this.confirm" class="blue-text">
            <span class="pointer" @click="deleteItem()">yes</span>
            /
            <span class="pointer" @click="cancelDelete()">no</span>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                confirm: false,
                csrfToken: ''
            }
        },
        mounted: function() {
            this.csrfToken = document.getElementById('csrf-token').content;
        },
        props: [
            'itemId',
            'deleteRoute',
        ],
        methods: {
            confirmDelete: function() {
                this.confirm = true;
            },
            cancelDelete: function() {
                this.confirm = false;
            },
            deleteItem: function() {
                document.getElementById('delete-form-' + this.itemId).submit();
            }
        }
    }
</script>

<style>

</style>