<template>
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Stages
                <button class="button is-success is-rounded ml15" @click="toggleCreatingStage()"><i class="fa fa-plus"></i></button>
            </p>
        </header>
        <div class="card-content">
            <div v-show="creatingStage" class="columns">
                <div class="column field">
                    <label class="label" for="stage_number">Stage Number</label>
                    <div class="control">
                        <input class="input" type="number" name="stage_number" v-model="newStage.stage_number" id="stage_number" />
                    </div>
                </div>

                <div class="column field">
                    <label class="label" for="start_location">Start Location</label>
                    <div class="control">
                        <input class="input" type="text" name="start_location" v-model="newStage.start_location" id="start_location" />
                    </div>
                </div>

                <div class="column field">
                    <label class="label" for="end_location">End Location</label>
                    <div class="control">
                        <input class="input" type="text" name="end_location" v-model="newStage.end_location" id="end_location" />
                    </div>
                </div>

                <div class="column field">
                    <label class="label" for="distance">Distance</label>
                    <div class="control">
                        <input class="input" type="number" name="distance" v-model="newStage.distance" id="distance" />
                    </div>
                </div>

                <div class="column">
                    <label class="label">&nbsp;<!-- empty for spacing --></label>
                    <div class="is-grouped field">
                        <div class="control">
                            <button class="button is-danger" @click="cancelCreateStage()"><i class="fa fa-times-circle"></i></button>
                        </div>
                        <div class="control">
                            <button class="button is-success" @click="createStage()"><i class="fa fa-save"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            
            <table class="table is-fullwidth">
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
