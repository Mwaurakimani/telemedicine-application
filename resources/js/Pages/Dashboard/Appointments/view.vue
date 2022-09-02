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
                </ul>
            </template>
        </dashboard-page-heading>
        <div id="appointments-view" class="dashboard-main-content-default">
            <div class="dual-section">
                <user-card></user-card>
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
                            <label for="">StatusStatus :</label>
                            <p>Confirmed</p>
                        </div>
                    </div>
                </section-card>
            </div>
            <div class="dual-section">
                <section-card :heading="'Summary'">
                    <p class="p-[20px]" style="font-size: 0.9em">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dicta dolorem enim,
                        est exercitationem minima tempora unde. A, accusantium architecto corporis cum deserunt
                        dignissimos enim expedita facere itaque iusto laborum laudantium neque odit quam quasi
                        quibusdam quisquam ratione reiciendis repudiandae sed temporibus, voluptas voluptatum?
                        Accusamus adipisci aliquid amet aspernatur commodi consequatur cumque dignissimos dolor
                        ipsam nisi officiis provident quo quos tempore voluptates.</p>
                </section-card>
                <section-card :heading="'Prescription'">
                <textarea style="width: 100%; height: 85%;border: 1px solid grey;border-radius: 8px" >

                </textarea>
                </section-card>
            </div>
            <div class="dual-section">
                <section-card :heading="'Reports'">
                </section-card>
            </div>
        </div>
    </Layout>
</template>
<script>
import userCard from "../../../AppComponents/userCard.vue";
import sectionCard from "../../../AppComponents/sectionCard.vue";

export default {
    name: 'view-appointment',
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
            ]
        }
    },
    mounted(){
        this.$store.commit('set_active_tab','Appointments')
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
