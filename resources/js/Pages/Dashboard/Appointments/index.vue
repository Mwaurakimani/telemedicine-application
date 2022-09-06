<template>
    <Layout>
        <dashboard-page-heading :pageTitle="'Appointments'">
            <template v-slot:action_buttons>
                <ul class="action-btn-holder">
                </ul>
            </template>
        </dashboard-page-heading>
        <div v-if="appointments != null && appointments.length > 0"  id="appointments-table" class="dashboard-main-content-default">
            <appointment-card v-for="card in appointments" :appointment="card" />
        </div>
        <div v-else id="appointments-table" class="dashboard-main-content-default">
            <div class="div" style="width: 100%; height: 200px;display: flex;align-items: center;justify-content: center">
                <p style="font-weight: bolder;font-size: 1.5em">No records Found ...</p>
            </div>
        </div>
    </Layout>
</template>

<script>
import AppointmentCard from "./AppointmentCard.vue";

export default {
    name: "listAppointments",
    props:['appointments'],
    components: {
        AppointmentCard,
    },
    data() {
        return {
            page_heading_action_buttons: [
                {
                    title: "Add New",
                    href: route('dashboard')
                },
            ]
        }
    },
}
</script>

<style scoped lang="scss">
#appointments-table {
    padding: 15px;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}
</style>
