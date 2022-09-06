<template>
    <Layout>
        <dashboard-page-heading :pageTitle="'Appointments'">
            <template v-slot:action_buttons >
                <ul class="action-btn-holder" >
                    <Link
                        v-for="btn in page_heading_action_buttons"
                        as="li"
                        :href="btn.href"
                        class="page-heading-action-btn button-outline"
                    >{{ btn.title }}</Link>

                    <li
                        as="li"
                        @click="update_appointment"
                        class="page-heading-action-btn button-outline"
                    >Update</li>
                </ul>
            </template>
        </dashboard-page-heading>
        <div id="appointments-view" class="dashboard-main-content-default">
            <div class="dual-section">
                <user-card :user_form="appointment.patient"></user-card>
                <section-card :heading="'Appointment Details'">
                    <div class="sect-2 appointment-details">
                        <div class="entry">
                            <label for="">Date created :</label>
                            <p>3/4/2022</p>
                        </div>
                        <div class="entry">
                            <label for="">Date Updated :</label>
                            <p>3/4/2022</p>
                        </div>
                        <div class="entry">
                            <label for="">Status :</label>
                            <select class="w-[100%] ml-[60px] p-[0px] pl-[5px] h-[30px]" v-model="appointment_form.status">
                                <option value="pending">pending</option>
                                <option value="accepted">accepted</option>
                                <option value="rejected">rejected</option>
                            </select>
                        </div>
                    </div>
                </section-card>
            </div>
            <div class="dual-section">
                <section-card :heading="'Summary'">
                    <textarea class="w-[100%]" style="height: calc(100% - 30px);border:1px solid lightgrey" v-model="appointment.more_info.summary">

                    </textarea>
                </section-card>
                <section-card :heading="'Prescription'">
                    <textarea class="w-[100%]" style="height: calc(100% - 30px);border:1px solid lightgrey" v-model="appointment.more_info.prescription">

                    </textarea>
                </section-card>
            </div>
            <div class="dual-section">
                <section-card v-if="appointment != null" :heading="'Reports'">
                    <div class="input-entry mb-[20px] ">
                        <label class="m-[10px] mr-[50px]">Upload report</label>
                        <input type="file" @input="form_file.file = $event.target.files[0]">
                        <button class="app-btn" @click="upload_file">Upload</button>
                    </div>
                    <div v-if="appointment.reports.length > 0" class="display-reports ">
                        <ul class="flex" style="justify-content: space-around; flex-wrap: wrap"  >
                            <li  v-for="(report,index) in appointment.reports" style="background-color: #00B4CF; cursor:pointer; color: white;border-radius: 8px" class="p-[6px] m-[5px];" :title="report.file_path" @click="download_report(report.id)"> Report {{ index + 1 }}</li>
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
import axios from "axios";

export default {
    name: 'view-appointment',
    props:['appointment'],
    components:{
        userCard,
        sectionCard
    },
    data(){
        return {
            page_heading_action_buttons:[
                {
                    title: "List Appointments",
                    href: route('list_appointments')
                },
            ],
            appointment_form: this.$inertia.form({
                ...this.appointment
            }),
            form_file: this.$inertia.form({
                id:this.appointment ? this.appointment.id : null,
                file:null
            })
        }
    },
    methods:{
        update_appointment(){
            this.appointment_form.post(route('update_appointment',[this.appointment.id]));
        },
        upload_file(){
            this.form_file.post(route('upload_report'))
        },
        download_report(report_id){
            window.open(route('download_report',[report_id]), '_blank');
        }
    }
}
</script>

<style scoped lang="scss">
#appointments-view{
    padding: 15px;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;

    .dual-section,.middle-section{
        width: 100%;
        height: 250px;
        margin-bottom: 40px;
    }
    .dual-section{
        display: flex;
        align-items: center;
        justify-content: space-between;

        &>div:first-of-type{
            width: 60%;
            height: 100%;
        }
        &>div:nth-of-type(2){
            width: calc(100% - 60% - 20px);
            height: 100%;
        }
    }
}

.appointment-details{
    padding: 0px 20px;
    font-size: 0.9em;
    .entry{
        display: flex;
        margin-bottom: 10px;
        label{
            width: 150px;

        }
    }
}
</style>
