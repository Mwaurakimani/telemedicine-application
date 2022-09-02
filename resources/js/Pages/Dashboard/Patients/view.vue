<template>
    <dashboard-page-heading :pageTitle="'Patients'">
    </dashboard-page-heading>

    <div id="doctor_form" class=" p-[15px] dashboard-main-content-default" style="margin-bottom: 40px">
        <div class="dual-section" style="height: fit-content">
            <user-card
                :mode="mode"
                :user="patient"
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
            <section-card style="max-width:600px" :heading="'Basic Information'">
                <div class="w-[600px]">

                </div>
            </section-card>
            <section-card style="flex-grow: 1;margin-left: 20px" :heading="'Reports'">

            </section-card>
        </div>
    </div>

    <div id="appointment_history" class=" p-[15px] dashboard-main-content-default">
        <h1 style="font-weight: bolder;font-size: 1.3em;color: dimgrey" class="mb-[30px]">Appointment History</h1>
        <div style="display: flex;justify-content: space-between;flex-wrap: wrap">
            <appointment-card v-for="card in 5"/>
        </div>
    </div>
</template>

<script>
import userCard from "../../../components/userCard.vue";
import sectionCard from "../../../components/sectionCard.vue";
import appointmentCard from "../Appointments/AppointmentCard.vue";

export default {
    name: "viewPatientsDetails",
    props:['patient'],
    components: {
        userCard,
        sectionCard,
        appointmentCard
    },
    data(){
        return{
            mode:'view_mode'
        }
    },
    mounted(){
        this.$store.commit('set_active_tab','Patients')
    }
}
</script>

<style scoped lang="scss">

</style>
