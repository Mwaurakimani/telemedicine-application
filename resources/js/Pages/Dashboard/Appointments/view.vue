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
        <template v-slot:mobile >

            <mobile-nav :title="'Appointment'"></mobile-nav>

            <div class="doctor-details shadow-display">
                <div class="doctor-det">
                    <div class="h3">{{ appointment.doctors.name }}</div>
                    <p>{{ appointment.doctors.practice }}</p>
                </div>
                <div class="location-display">
                    <div class="icon">

                    </div>
                    <p>{{ appointment.doctors.address }}</p>
                </div>
            </div>
            <div class="appointment-details shadow-display">
                <div class="info-group">
                    <label for="">Time</label>
                    <p>{{ appointment.appointment_time }}</p>
                </div>
                <div class="info-group">
                    <label for="">Date</label>
                    <p>{{ appointment.appointment_dte }}</p>
                </div>
            </div>

            <div class="summary section-display">
                <h2>Summary</h2>
                <p class="shadow-display">{{ appointment.more_info.summary }}</p>
            </div>
            <div class="prescription section-display">
                <h2>Prescription</h2>
                <p class="shadow-display">{{ appointment.more_info.prescription }}</p>
            </div>
            <div class="reports section-display">
                <h2>Reports</h2>
                <ul class="pills-list shadow-display">
                    <li v-for="report in appointment.reports">{{ (report.file_path).slice(0, 10) }}</li>
                </ul>
            </div>
        </template>
    </Layout>
</template>
<script>
import userCard from "../../../AppComponents/userCard.vue";
import sectionCard from "../../../AppComponents/sectionCard.vue";
import axios from "axios";
import mobileNav from "../../../AppComponents/mobileNav.vue";

export default {
    name: 'view-appointment',
    props: {
        appointment:{
            type:Object,
            default:{
                id:1,
                patient_id:4,
                doctor_id:3,
                appointment_dte:"2022-09-09",
                appointment_time:"15:28:00",
                status:"accepted",
                created_at:"2022-09-04T12:29:03.000000Z",
                updated_at:"2023-01-06T11:40:10.000000Z",
                doctors:{
                    account_type:"Doctor",
                    address:"Nairobi CBD",
                    created_at:"2022-09-04T11:28:14.000000Z",
                    date_of_birth:"2022-09-04",
                    email:"doctorone@email.com",
                    email_verified_at:null,
                    gender:"Male",
                    id:3,
                    name:"Doctor",
                    notes:"This is doctor one bio",
                    phone:"0700000000",
                    practice:"Gynacologist",
                    profile_photo_path:null,
                    profile_photo_url:"https://ui-avatars.com/api/?name=D&color=7F9CF5&background=EBF4FF",
                    two_factor_confirmed_at:null,
                    updated_at:"2022-09-05T17:55:23.000000Z",

                },
                patient:{
                    account_type:"Patient",
                    address:"Kiambu CBD",
                    created_at:"2022-09-04T11:30:42.000000Z",
                    date_of_birth:"2022-09-04",
                    email:"patientone@email.com",
                    email_verified_at:null,
                    gender:"Male",
                    id:4,
                    name:"Patient 1",
                    notes:"This is patient 12",
                    phone:"0700000000",
                    practice:null,
                    profile_photo_path:null,
                    profile_photo_url:"https://ui-avatars.com/api/?name=P+1&color=7F9CF5&background=EBF4FF",
                    two_factor_confirmed_at:null,
                    updated_at:"2022-09-05T17:47:07.000000Z",

                },
            }
        }
    },
    components:{
        mobileNav,
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





.doctor-details{
    width: 95%;
    background-color: white;
    margin: auto;
    display: flex;
    margin-bottom: 40px !important;

    .doctor-det{
        margin: 20px;
        width: 50%;
        .h3{
            font-weight: bolder;

        }
        p{
            color: #2bd225;
            font-weight: bolder;
        }
    }
    .location-display{
        margin-top: 20px;
        color: grey;
        display: flex;

        .icon{
            width: 20px;
            height: 20px;
            margin-right: 5px;
            background-color: #2bd225;
        }
    }
}

.appointment-details{
    width: 95%;
    margin: auto;
    margin-bottom: 40px !important;
    .info-group{
        display: flex;
        height: 40px;
        line-height: 40px;
        label{
            width: 60px;
            font-weight: bolder;
            color: grey;
        }
    }
}


.section-display{
    width: 95%;
    margin: auto;
    margin-bottom: 40px;
    h2{
        font-weight: bolder;
        color: grey;
        margin-bottom: 10px;
    }

    p{
        padding: 10px;
        color: grey;
    }
}



.reports{
    ul{
        display: flex;
        padding: 10px;
        li{
            color: white;
            border-radius: 5px;
            margin: 5px;
            padding: 5px 10px;
            background-color: #2bd225;
        }
    }
}






.shadow-display{
    box-shadow:  0 2px 9px #c2c2c2;
    border-radius: 5px;
    background-color: white;
    margin-bottom: 10px;
}
</style>
