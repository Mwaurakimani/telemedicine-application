<template>
    <Layout>
        <dashboard-page-heading :pageTitle="'Appointments'">
            <template v-slot:action_buttons>
                <ul class="action-btn-holder">

                    <Link
                        v-for="btn in page_heading_action_buttons"
                        as="li"
                        :href="btn.href"
                        class="page-heading-action-btn button-outline"
                    >{{ btn.title }}
                    </Link>
                </ul>
            </template>
        </dashboard-page-heading>
        <div id="appointments-table" class="dashboard-main-content-default">
            <appointment-card v-for="card in 20"/>
        </div>
    </Layout>
</template>

<script>
import AppointmentCard from "./AppointmentCard.vue";

export default {
    name: "listAppointments",
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
    mounted() {
        // this.$store.commit('set_active_tab', 'Appointments')
    }
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
