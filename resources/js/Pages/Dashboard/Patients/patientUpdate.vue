<template>
    <Layout>
        <dashboard-page-heading :pageTitle="'Patients'">
        </dashboard-page-heading>

        <button @click.prevent="update_patient()" class="button-fill p-[10px] m-[20px] ml-[30px]" >Update</button>

        <div id="doctor_form" class=" p-[15px] dashboard-main-content-default" style="margin-bottom: 40px">
            <div class="dual-section" style="height: fit-content">
                <user-card :mode="mode" :user_form="patient"
                    class="h-[350px] min-w-[600px]">
                    <template v-slot:ratings_section>
                        <div class="ratting-section">
                            <h5>Rating</h5>
                            <p style="">4.5</p>
                        </div>
                    </template>
                </user-card>
                <section-card style="flex-grow: 1" class="ml-[20px] h-[auto]"
                              :heading="'Patient\'s Bio'">
                    <div class="sect-2 appointment-details">
                        <p v-if="mode == 'view_mode'" class="w-[100%] h-[270px]" style="overflow: auto"></p>
                        <textarea v-model="patient.bio" style="width: 100%;min-height:320px;border: 1px solid lightgrey;border-radius: 8px" >

                        </textarea>
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
    name: "patientView",
    components: {
        userCard,
        sectionCard,
        appointmentCard
    },
    props:['patients'],
    data(){
        return {
            mode:'edit_mode',
            patient:this.$inertia.form({
                name: this.patients.name,
                email: this.patients.email,
                phone: this.patients.phone,
                address: this.patients.address,
                date_of_birth: this.patients.date_of_birth,
                gender: this.patients.gender,
                bio: this.patients.notes,
                file:null
            }),
        }
    },
    methods:{
        update_patient(){
            this.patient.post(route('put_patient',[this.patients.id]))
        },
    },
    mounted(){
        // this.$store.commit('set_active_tab','Patients')
    }
}
</script>

<style scoped lang="scss">

</style>
