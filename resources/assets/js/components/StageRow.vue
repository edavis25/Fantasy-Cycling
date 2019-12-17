<template>
    <tr>
        <td>
            <div v-if="editing" class="field m-0">
                <input type="number" class="input is-small" name="stage_number" v-model="currentValues.stage_number" id="stage_number" min="1">
            </div>
            <div v-else>{{ defaultValues.stage_number }}</div>
        </td>
        <td>
            <div v-if="editing" class="field m-0">
                <input type="text" class="input is-small" name="start_location" v-model="currentValues.start_location" id="start_location">
            </div>
            <div v-else>{{ defaultValues.start_location }}</div>
        </td>
        <td>
            <div v-if="editing" class="field m-0">
                <input type="text" class="input is-small" name="end_location" v-model="currentValues.end_location" id="end_location">
            </div>
            <div v-else>{{ defaultValues.end_location }}</div>
        </td>
        <td>
            <div v-if="editing" class="field m-0">
                <input type="number" class="input is-small" name="distance" v-model="currentValues.distance" id="distance" min="1">
            </div>
            <div v-else>{{ defaultValues.distance }}</div>
        </td>
        <td>
            <a :href="editUrl" v-show="!editing"><i class="fa fa-chart-area has-text-primary pointer"></i></a>
            <span v-show="canEdit">
                <span v-if="editing && !saving && !saved">
                    <i class="fa fa-save fa has-text-success pointer" @click="saveChanges()"></i>
                    <i class="fa fa-ban  has-text-danger pointer" @click="toggleEdit()"></i>
                </span>
                <span v-else-if="editing && saving">
                    <i class="fas fa-sync fa-spin blue-text"></i>
                </span>
                <span v-else-if="editing && saved">
                    <i class="fa fa-check has-text-success"></i>
                </span>
                <span v-else-if="!editing">
                    <i class="fa fa-edit has-text-warning pointer" @click="toggleEdit()"></i>
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
                        alert('error');
                        console.error(error.response);
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
