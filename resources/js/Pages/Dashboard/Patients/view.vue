<template>
    <Layout>
        <dashboard-page-heading :pageTitle="'Patients'">

            <template v-slot:action_buttons >
                <ul class="action-btn-holder" >

                    <Link
                        v-for="btn in page_heading_action_buttons"
                        as="li"
                        :href="btn.href"
                        class="page-heading-action-btn button-outline"
                    >{{ btn.title }}</Link>
                </ul>
            </template>
        </dashboard-page-heading>

        <div id="doctor_form" class=" p-[15px] dashboard-main-content-default" style="margin-bottom: 40px">
            <div class="dual-section" style="height: fit-content">
                <user-card
                    :mode="mode"
                    :user_form="patient"
                    class="h-[350px] min-w-[600px]">
                </user-card>
                <section-card style="flex-grow: 1" class="ml-[20px] h-[350px]"
                              :heading="'Patient\'s Bio'">
                    <div class="sect-2 appointment-details">
                        <p class="w-[100%] h-[270px]" style="overflow: auto"> {{ patient.notes }}</p>
                    </div>
                </section-card>
            </div>
            <div class="dual-section">
                <section-card style="flex-grow: 1;margin-left: 20px" :heading="'Reports'">
                    <div v-if="reports && reports.length > 0" class="display-reports ">
                        <ul class="flex" >
                            <li  v-for="(report,index) in reports" style="background-color: #00B4CF; cursor:pointer; color: white;border-radius: 8px" class="p-[6px] m-[5px] mr-[5px];" :title="report.file_path" @click="download_report(report.id)"> Report {{ index + 1 }}</li>
                        </ul>
                    </div>
                </section-card>
            </div>
        </div>
    </Layout>
</template>

<script>
import userCard from "../../../AppComponents/userCard.vue";
import sectionCard from "../../../AppComponents/sectionCard.vue";
import appointmentCard from "../Appointments/AppointmentCard.vue";

export default {
    name: "viewPatientsDetails",
    props:['patient','reports'],
    components: {
        userCard,
        sectionCard,
        appointmentCard
    },
    data(){
        return{
            mode:'view_mode',
            page_heading_action_buttons:[
                {
                    title: "Chat",
                    href: route('initiate_chat',[this.patient.id])
                },
                {
                    title: "Edit",
                    href: route('update_patient',[this.patient.id])
                },
            ]
        }
    },
    methods:{
        download_report(report_id){
            window.open(route('download_report',[report_id]), '_blank');
        }
    },
    mounted(){
        // this.$store.commit('set_active_tab','Patients')
    }
}
</script>

<style scoped lang="scss">

</style>
