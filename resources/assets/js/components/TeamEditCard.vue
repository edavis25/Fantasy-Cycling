<template>
    <div class="card">
        <div class="card-image">
            <a class="btn-floating halfway-fab waves-effect waves-light red" @click="removeTeam(team.id)"><i class="material-icons">delete</i></a>
        </div>

        <div class="card-content">
            <span class="card-title">{{ team.team.name }}</span>
            <table v-if="hasRiders">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Cost</th>
                    <th>Role</th>
                    <th><!-- empty for action buttons --></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="rider in team.riders">
                    <td>{{ rider.rider.name }}</td>
                    <td>{{ rider.cost }}</td>
                    <td>{{ getRoleById(rider.role_id) }}</td>
                    <td><i class="material-icons" @click="removeRider(rider)">delete</i></td>
                </tr>
                </tbody>
            </table>
            <p v-else class="valign-wrapper blue-text text-darken-2">
                <i class="material-icons">info</i>&nbsp;
                No riders have been added to this team
            </p>
        </div>

        <div class="card-action">
            <div class="row">
                <div class="input-field col s5">
                    <select v-model="selectedRiderId">
                        <option value="" disabled selected>Select rider</option>
                        <option v-for="(rider, key) in riders" :value="key">{{ rider }}</option>
                    </select>
                </div>
                <div class="input-field col s3">
                    <input type="number" v-model="selectedRiderCost" />
                    <label>Cost</label>
                </div>
                <div class="input-field col s3">
                    <select v-model="selectedRoleId">
                        <option value="" disabled selected>Role</option>
                        <option v-for="(role, key) in riderRoles" :value="key">{{ role }}</option>
                    </select>
                    <label>Rider Role</label>
                </div>
                <div class="input-field col s1">
                    <button type="button" class="btn-floating green" @click="addRider()"><i class="material-icons">add</i></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:  'team-edit-card',
        props: {
            team: {
                type: Object,
                required: true
            },
            raceId: {
                required: true
            },
            riders: {
                type: Object,
                required: true
            },
            riderRoles: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                selectedRiderId: null,
                selectedRiderCost: null,
                selectedRoleId: null
            }
        },
        computed: {
            hasRiders() {
                return this.team.hasOwnProperty('riders') && this.team.riders.length;
            }
        },
        methods: {
            removeTeam() {
                window.axios.delete(route('admin.race.teams.destroy', { race: this.raceId, team: this.team.id }))
                    .then(response => {
                        this.$emit('team-removed', this.team);
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            addRider() {
                let data = {
                    riderId: this.selectedRiderId,
                    cost: this.selectedRiderCost,
                    teamId: this.team.id,
                    roleId: this.selectedRoleId
                };
                window.axios.post(route('admin.race.riders.store', { race: this.raceId }), data)
                    .then(response => {
                        this.team.riders.push(response.data.rider);

                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            getRoleById(id) {
                return this.riderRoles.hasOwnProperty(id) ? this.riderRoles[id] : '';
            },
            removeRider(rider) {
                window.axios.delete(route('admin.race.riders.destroy', { race: this.raceId, rider: rider.id }))
                    .then(response => {
                        this.team.riders.splice(this.team.riders.indexOf(rider), 1);
                    })
                    .catch(error => {
                        alert(error);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
