<template>
    <Layout>
        <dashboard-page-heading :pageTitle="'Patients'">
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

        <div v-if=" patients && patients.length > 0" id="patients-table" class="dashboard-main-content-default">
                    <user-table-card
                        v-for="patient in patients" :key="patient.id" :user="patient" :router_link="'view_patient_details'">
                    </user-table-card>
        </div>
        <div v-else id="doctor-table" class="dashboard-main-content-default">
            <div class="div" style="width: 100%; height: 200px;display: flex;align-items: center;justify-content: center">
                <p style="font-weight: bolder;font-size: 1.5em">No records Found ...</p>
            </div>
        </div>
    </Layout>
</template>

<script>

import userTableCard from "../Doctors/component/userTableCard.vue";

export default {
    name: "listPatients",
    props:['patients'],
    components: {
        userTableCard
    },
    data() {
        return {
            page_heading_action_buttons: [
                {
                    title: "Add New",
                    href: route('edit_patient')
                },
            ]
        }
    },
    mounted(){
        // this.$store.commit('set_active_tab','Patients')
    }
}
</script>

<style scoped lang="scss">
#patients-table {
    padding: 15px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
</style>
