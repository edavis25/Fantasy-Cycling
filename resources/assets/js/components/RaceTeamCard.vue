<template>
    <div class="card">
        <div class="card-content">
            <div class="card-title">Teams</div>
            <div class="row">
                <div class="col m5">
                    <select v-model="selectedTeamId">
                        <option disabled selected>Choose a team</option>
                        <option v-for="(id, name) in availableTeams" :value="id" :disabled="teamAlreadyExists(id)">{{ name }}</option>
                    </select>

                </div>
                <a class="btn-floating waves-effect waves-light green ml10" :disabled="!selectedTeamId" @click="addTeam()"><i class="material-icons">add</i></a>
            </div>
            <div class="row">
                <div v-for="team in currentTeams">
                    <div class="col s6">
                        <team-edit-card :team="team" :race-id="raceId" :riders="riders" :rider-roles="riderRoles" @team-removed="removeTeam"></team-edit-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import TeamEditCard from './TeamEditCard';

    export default {
        name:  'race-team-card',
        props: {
            availableTeams: {
                type: Object,
                required: true,
            },
            raceId: {
                type: Number,
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
        components: {
            'team-edit-card': TeamEditCard,
        },
        data() {
            return {
                creatingTeam: false,
                currentTeams: [],
                selectedTeamId: null,
            }
        },
        created: function() {
            this.getTeams();
        },
        methods: {
            getTeams() {
                window.axios.get(route('admin.race.teams.index', { race: this.raceId }))
                    .then((response) => {
                        console.log(response.data.teams);
                        this.currentTeams = response.data.teams;
                    })
                    .catch((error) => {
                        console.error(error);
                        alert('something went wrong');
                    });
            },
            addTeam() {
                window.axios.post(route('admin.race.teams.store', { race: this.raceId }), { team_id: this.selectedTeamId })
                    .then((response) => {
                        if (!this.teamAlreadyExists(response.data.team.id)) {
                            this.currentTeams.push(response.data.team);
                        }
                    })
                    .catch((error) => {
                        console.error(error);
                    })
                    .finally(() => {
                        this.$nextTick(() => {
                            $('select').formSelect();
                        });

                        this.selectedTeamId = undefined;
                    });
            },
            removeTeam(event) {
                this.currentTeams.splice(this.currentTeams.indexOf(event), 1);
            },
            removeRider(rider, riderArray) {
                window.axios.delete(route('admin.race.riders.destroy', { race: this.raceId, rider: rider.id }))
                    .then(response => {
                        riderArray.splice(riderArray.indexOf(rider), 1);
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            teamAlreadyExists(teamId) {
                return this.currentTeams.find(function (obj) { return obj.id === teamId; });
            },
            getRoleById(id) {
                return this.riderRoles.hasOwnProperty(id) ? this.riderRoles[id] : '';
            }
        }
    }
</script>

<style scoped>

</style>
