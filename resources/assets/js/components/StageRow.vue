<template>
    <tr>
        <td>
            <div v-if="editing" class="input-field m-0">
                <input type="number" class="m-0" name="stage_number" v-model="currentValues.stage_number" id="stage_number" min="1">
                <label for="stage_number" class="active">Stage Number</label>
            </div>
            <div v-else>{{ defaultValues.stage_number }}</div>
        </td>
        <td>
            <div v-if="editing" class="input-field m-0">
                <input type="text" class="m-0" name="start_location" v-model="currentValues.start_location" id="start_location">
                <label for="start_location" class="active">Start Location</label>
            </div>
            <div v-else>{{ defaultValues.start_location }}</div>
        </td>
        <td>
            <div v-if="editing" class="input-field m-0">
                <input type="text" class="m-0" name="end_location" v-model="currentValues.end_location" id="end_location">
                <label for="end_location" class="active">End Location</label>
            </div>
            <div v-else>{{ defaultValues.end_location }}</div>
        </td>
        <td>
            <div v-if="editing" class="input-field m-0">
                <input type="text" class="m-0" name="distance" v-model="currentValues.distance" id="distance" min="1">
                <label for="distance" class="active">Distance (km)</label>
            </div>
            <div v-else>{{ defaultValues.distance }}</div>
        </td>
        <td>
            <a :href="editUrl" v-show="!editing"><i class="material-icons blue-text">equalizer</i></a>
            <span v-show="canEdit">
                <span v-if="editing && !saving && !saved">
                    <i class="material-icons green-text pointer" @click="saveChanges()">save</i>
                    <i class="material-icons orange-text pointer" @click="toggleEdit()">cancel</i>
                </span>
                <span v-else-if="editing && saving">
                    <i class="fas fa-sync fa-spin blue-text"></i>
                </span>
                <span v-else-if="editing && saved">
                    <i class="material-icons green-text">check</i>
                </span>
                <span v-else-if="!editing">
                    <i class="material-icons orange-text pointer" @click="toggleEdit()">edit</i>
                    <delete-confirm item-id="stage.id" :delete-route="deleteRoute"></delete-confirm>
                </span>
            </span>
        </td>
    </tr>
</template>

<script>
    export default {
        name: 'stage-row',
        props: [
            /** @var Object[] App\Stage */
            'stage',
            /** @var Object[] App\Race */
            'race',
            /** @var bool */
            'canEdit'
        ],
        data() {
            return {
                editing:       false,
                deleteRoute:   '',
                updateRoute:   '',
                currentValues: {},
                defaultValues: {},
                saving: false,
                saved: false
            }
        },
        computed: {
            editUrl() {
                return route('admin.stage-scoring.edit', { id: this.stage.id });
            }
        },
        mounted: function() {
            // Set the resource routes after component mounted
            this.deleteRoute = route('admin.race.stages.destroy', { race: this.race.id, stage: this.stage.id });
            this.updateRoute = route('admin.race.stages.update', { race: this.race.id, stage: this.stage.id });

            // Set the default values for the stage
            this.setDefaultStageValues();
        },
        methods: {
            toggleEdit: function() {
                // When toggling edit back, set default values
                if (this.editing) {
                    this.currentValues = Object.assign({}, this.defaultValues);
                }

                this.editing = !this.editing;
            },
            setDefaultStageValues: function() {
                Object.assign(this.currentValues, this.stage);
                Object.assign(this.defaultValues, this.stage);
            },
            saveChanges: function() {
                this.saving = true;
                axios.put(this.updateRoute, this.currentValues)
                    .then((response) => {
                        this.currentValues = Object.assign({}, response.data.stage);
                        this.defaultValues = Object.assign({}, response.data.stage);
                        this.saved = true;
                        this.resetAfterSave();
                    })
                    .catch((error) => {
                        // TODO: Do something w/ error
                        console.log(error.response);
                    })
                    .finally(() => {
                        this.saving = false;
                        this.currentValue = {};
                    });
            },
            resetAfterSave: function() {
                setTimeout(() => {
                    this.saved   = false;
                    this.editing = false;
                }, 1000);
            },
            getStage: function() {

            }
        }
    }
</script>
