<template>
    <Layout>
        <dashboard-page-heading :pageTitle="'Doctors'">
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

        <div v-if="Doctors && Doctors.length > 0" id="doctor-table" class="dashboard-main-content-default">
            <user-table-card
                v-for="doctor in Doctors" :router_link="'view_doctor_details'" :user="doctor" :key="doctor.id">

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
import userTableCard from './component/userTableCard.vue';

export default {
    name: "listDoctors",
    props:['Doctors'],
    components:{
        userTableCard
    },
    data(){
        return {
            page_heading_action_buttons:[
                {
                    title: "Add New",
                    href: route('create_doctor')
                },
            ]
        }
    },
    mounted(){
        // this.$store.commit('set_active_tab','Doctors')
    }
}
</script>

<style scoped lang="scss">
#doctor-table{
    padding: 15px;
    display: flex;
    flex-wrap: wrap;
    &>div{
        margin: 0px 10px;
    }
}
</style>
