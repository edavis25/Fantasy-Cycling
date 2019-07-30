<template>
    <div class="card">
        <div class="card-content">
            <a class="btn-floating right waves-effect waves-light green" v-show="canEdit" @click="toggleCreatingStage()" v-bind:disabled="creatingStage"><i class="material-icons">add</i></a>
            <span class="card-title">Stages</span>
        </div>

        <div class="card-content">
            <alert v-show="responseStatus === 'success'" class="mt-25" type="success" v-bind:message="responseMessage"></alert>
            <alert v-show="responseStatus === 'error'" class="mt-25" type="danger" v-bind:message="responseMessage"></alert>

            <table v-show="creatingStage">
                <tr>
                    <td>
                        <div class="input-field">
                            <input type="number" name="stage_number" v-model="newStage.stage_number" id="stage_number">
                            <label for="stage_number">Stage Number</label>
                        </div>
                    </td>
                    <td>
                        <div class="input-field">
                            <input type="text" name="start_location" v-model="newStage.start_location" id="start_location">
                            <label for="start_location">Start Location</label>
                        </div>
                    </td>
                    <td>
                        <div class="input-field">
                            <input type="text" name="end_location" v-model="newStage.end_location" id="end_location">
                            <label for="end_location">End Location</label>
                        </div>
                    </td>
                    <td>
                        <div class="input-field">
                            <input type="number" name="distance" v-model="newStage.distance" id="distance">
                            <label for="distance">Distance</label>
                        </div>
                    </td>
                    <td>
                        <i class="material-icons green-text pointer" @click="createStage()">save</i>
                        <i class="material-icons orange-text pointer" @click="cancelCreateStage()">cancel</i>
                    </td>
                </tr>
            </table>

            <table class="responsive-table highlight striped">
                <thead>
                    <tr>
                        <td>Stage Number</td>
                        <td>Start Location</td>
                        <td>End Location</td>
                        <td>Distance (km)</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                <!--
                <tr v-for="stage in stages">
                    <td>{{ stage.stage_number }}</td>
                    <td>{{ stage.start_location }}</td>
                    <td>{{ stage.end_location }}</td>
                    <td>{{ stage.distance }}</td>
                    <td>
                        <a href="###"><i class="material-icons text-blue">visibility</i></a>
                    </td>
                </tr>
                -->
                    <stage-row v-for="stage in stages" :key="stage.id" :stage="stage" :race="race" can-edit="true"></stage-row>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import StageRow from './StageRow.vue'

    export default {
        components: {
            'stage-row' : StageRow
        },
        data() {
            return {
                responseStatus:  '',
                responseMessage: '',
                creatingStage:   false,
                newStage: {
                    stage_number:   null,
                    start_location: null,
                    end_location:   null,
                    distance:       null
                }
            }
        },
        props: [
            /** @var Object[] App\Stage */
            'stages',
            /** @var Object[] App\Race */
            'race',
            /** @var bool */
            'canEdit'
        ],
        methods: {
            toggleCreatingStage: function() {
                this.creatingStage = !this.creatingStage;
            },
            createStage: function() {
                let storeRoute = route('admin.race.stages.store', { race: this.race, stage: this.stage });

                axios.post(storeRoute, this.newStage)
                    .then((response) => {
                        this.stages.push(response.data);
                        this.responseStatus  = 'success';
                        this.responseMessage = 'Stage created successfully!';
                        this.cancelCreateStage();
                    })
                    .catch((error) => {
                        this.responseStatus  = 'error';
                        this.responseMessage = 'Something went wrong: ' + error.response.data.message;
                        this.cancelCreateStage();
                    })
            },
            cancelCreateStage: function() {
                this.resetNewStage();
                this.creatingStage = false;
            },
            resetNewStage: function() {
                this.newStage.stage_number   = null;
                this.newStage.start_location = null;
                this.newStage.end_location   = null;
                this.newStage.distance       = null;
            }
        }
    }
</script>
