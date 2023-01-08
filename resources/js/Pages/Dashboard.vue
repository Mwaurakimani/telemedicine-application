<template>
    <Layout>
        <dashboard-page-heading :pageTitle="'Dashboard'">
        </dashboard-page-heading>
        <template v-slot:mobile >
            <div class="top-banner">
                <div class="top-section">
                    <div class="welcome-section">
                        <p>welcome</p>
                        <h1>Username</h1>
                    </div>
                    <div class="user-action">
                        <Link href="/accountPage" class="action-icon">
                            <img src="/storage/SystemFiles/icons/user-icon.png" alt="">
                        </Link>
                        <div @click="logout" class="action-icon">
                            <img src="/storage/SystemFiles/icons/sign-out.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="bottom-section">

                </div>
            </div>
            <div class="calling-cards" style="">
                <Link as="div" href="/bookAppointment" class="calling-card" style="color: white;background-image: linear-gradient(130deg,rgb(4, 194, 4), rgb(73, 213, 125));">
                    <Link as="div" href="bookAppointment" class="icon">
                        <img src="/storage/SystemFiles/icons/calender.png" alt="">
                    </Link>
                    <p>Booking an appointment</p>
                </Link>
                <div class="calling-card bg-white" style="color: grey">
                    <div class="icon">
                        <img src="/storage/SystemFiles/icons/doctor.png" alt="">
                    </div>
                    <p style="color: rgb(4, 194, 4)">View Doctors</p>
                </div>
            </div>
            <h2>Appointments</h2>
            <div v-if="appointments != null" class="appointment-list">
               <div v-for="appointment in appointments">
                   <appointmentCard  :appointment="appointment"></appointmentCard>
               </div>
            </div>
            <div v-else class="appointment-list">
                <p style="width: 95%;display: block;margin: auto;color: grey">No appointments booked</p>
            </div>
        </template>
    </Layout>
</template>

<script>
import appointmentCard from "./Dashboard/Appointments/AppointmentCard.vue";

export default {
    name: 'DashboardIndex',
    props:{
        appointments:{
            type: Object,
            default:null
        }
    },
    components: {
        appointmentCard
    },

    methods:{
        logout(){
            axios.post('/logout')
                .then((resp) => {
                    window.location = "/";
                });
        }
    },

    mounted() {
        // this.$store.commit('set_active_tab', 'Dashboard')
    }
}
</script>

<style lang="scss" scoped>
.top-banner{
    width: 100%;
    height: 100px;
    padding-top: 20px;
    background-image: linear-gradient(130deg,rgb(4, 194, 4), rgb(73, 213, 125));
    margin-bottom: 20px;

    .top-section{
        width: 100%;
        height: 60px;
        display: flex;
        justify-content: space-between;
        .welcome-section{
            width: 140px;
            height: 100%;
            display: flex;
            align-items: start;
            flex-direction: column;
            padding-left: 20px;
            color: white;
            p{
                margin-bottom: 5px;
            }
            h1{
                font-weight: bolder;
                font-size: 1.2em;
            }
        }
        .user-action{
            width: 70px;
            margin-right: 5px;
            display: flex;
            justify-content: space-between;
            .action-icon{
                width: 30px;
                height: 30px;
            }
        }
    }
}

.calling-cards{
    margin: auto;
    width: 95%;
    display: flex;
    justify-content: space-between;

    .calling-card{
        width: 160px;
        border-radius: 5px;
        padding-bottom: 5px;
        box-shadow: 0 0 6px lightgrey;
        margin-bottom: 30px;
        .icon{
            width: 40px;
            height: 40px;
            margin: 10px;
        }
        p{
            margin-left: 10px;
            font-size: 0.9em;
        }
    }
}

h2{
    margin-left: 20px;
    font-weight: bolder;
    color: grey;
    margin-bottom: 10px;
}
.appointment-list{
    width: 96%;
    margin: auto;
}
</style>
