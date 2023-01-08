<template>
    <Layout>
        <template v-slot:mobile >

            <mobile-nav :title="'Booking'"></mobile-nav>

            <div class="get-doctor shadow-display">
                <input id="doctor_name" type="text" placeholder="Search doctor.."  @keyup="get_doctor">
                <div class="doctor-list">
                    <ul>
                        <li @click.stop="select_doctor(doctor.id,doctor.name)" v-for="doctor in doctors_list">
                            <h5>{{ doctor.name }}</h5>
                            <p>{{ doctor.practice }}</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="appointment-details shadow-display">
                <div class="info-group">
                    <label for="">Time</label>
                    <input type="time" v-model="appointment.time">
                </div>
                <div class="info-group">
                    <label for="">Date</label>
                    <input type="date" v-model="appointment.date">
                </div>
            </div>

            <button @click="book_appointment">Confirm</button>
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
    components:{
        mobileNav,
        userCard,
        sectionCard
    },
    data(){
        return {
            appointment: this.$inertia.form({
                doctor_id:null,
                patient_id:this.$attrs.user.id,
                time:null,
                date:null,
            }),
            doctors_list:[]
        }
    },
    methods:{
        get_doctor:_.debounce( function (event){

            let value = event.target.value

            this.appointment.doctor_id =  null

            if (value.trim() !== '' & value !== undefined) {
                axios.post(route('get_doctor_by_name'), {
                    name: value
                }).then((resp) => {
                    if(resp.data.length > 0){
                        this.doctors_list = resp.data
                    }else{
                        console.log("no data found")
                    }
                })
            }

        }, 200),

        select_doctor(id,name){
            $("#doctor_name").val(name)

            this.doctors_list = []

            this.appointment.doctor_id = id
        },
        book_appointment(){
            this.appointment.post(route('make_Appointment'));
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



.top-nav{
    width: 100%;
    height: 50px;
    background-color: #2bd225;
    color: white;
    line-height: 50px;
    padding: 10px;
    font-size: 1.3em;
    font-weight: bolder;
    margin-bottom: 20px;
}

.get-doctor{
    width: 95%;
    background-color: red;
    margin: auto;
    margin-bottom: 30px !important;
    padding-top: 10px;
    padding-bottom: 10px;

    input{
        border: 1px solid lightgrey;
        display: block;
        border-radius: 8px;
        height: 40px;
        width: 95%;
        margin: 5px auto 10px;
    }

    .doctor-list{
        width: 95%;
        margin: auto;
        ul{
            li{
                border-bottom: 1px solid #eaeaea;
                margin-bottom: 2px;
                padding: 5px;

                h5{
                    margin-bottom: 2px;
                }

                P{
                    font-size: smaller;
                    color: grey;
                }
            }
            li:last-of-type{
                border-bottom: none;
            }
        }
    }
}


.appointment-details{
    width: 95%;
    margin: auto;
    margin-bottom: 40px !important;
    padding: 10px 10px;
    .info-group{
        display: flex;
        height: 40px;
        line-height: 40px;
        label{
            width: 60px;
            font-weight: bolder;
            color: grey;
        }

        input{
            width: 200px;
            height: 30px;
            margin-top: 5px;
            border: 1px solid lightgrey;
        }
    }
}

button{
    display: block;
    margin: auto;
    border-radius: 8px;
    width: 95%;
    padding: 10px;
    background-color: lawngreen;
    color: white;
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
