<template>
    <Layout>
        <dashboard-page-heading :pageTitle="'Doctors'">
        </dashboard-page-heading>

        <div id="doctor_form" class=" p-[15px] dashboard-main-content-default">
            <div class="dual-section" style="height: fit-content" >
                <user-card

                    :user_form="doctor"

                    class="
                h-[350px]
                min-w-[600px]"
                >
                    <template v-slot:ratings_section>
                        <div class="ratting-section">
                            <h5>Rating</h5>
                            <p style="" >4.5</p>
                        </div>
                    </template>
                </user-card>
                <section-card style="flex-grow: 1" class="ml-[20px] h-[350px]"
                              :heading="'Doctor\'s Bio'">
                    <div class="sect-2 appointment-details">
                        <p  class="w-[100%] h-[270px]" style="overflow: auto" >{{ doctor.notes }}</p>
                    </div>
                </section-card>
            </div>
            <div class="dual-section">
                <section-card style="max-width:600px" :heading="'Basic Information'">
                    <div class="w-[600px]">

                    </div>
                </section-card>
                <section-card style="flex-grow: 1;margin-left: 20px" :heading="'Stats'">

                </section-card>
            </div>
        </div>
    </Layout>
</template>

<script>

import userCard from "../../../AppComponents/userCard.vue";
import sectionCard from "../../../AppComponents/sectionCard.vue";


export default {
    name: "listAppointments",
    props: ['doctor'],
    components: {
        userCard,
        sectionCard
    },
    mounted(){
        // this.$store.commit('set_active_tab','Doctors')
    }
}
</script>

<style scoped lang="scss">
.ratting-section{
    width: 100%;
    height: 50px;
    margin-bottom: 20px;
    p{
        font-weight: bolder;
        font-size: 1.4em;
        color: var(--primarry-color-blue);
        padding-left: 20px;
    }

}
</style>
