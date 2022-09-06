<template>
    <Layout>
        <dashboard-page-heading :pageTitle="'Account Settings'">
        </dashboard-page-heading>

        <button @click.prevent="update_doctor()" class="button-fill p-[10px] m-[20px] ml-[30px]" >Update</button>

        <div id="doctor_form" class=" p-[15px] dashboard-main-content-default"  >
            <div class="dual-section" style="height: fit-content;">
                <user-card :mode="mode" :user_form="doctor"
                    class="
                h-[480px]
                min-w-[600px]"
                >
                    <template v-slot:doctor_practice>
                        <div  class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Practice</span>
                            <input v-model="doctor.practice" type="text" autocomplete="off" class="form-control"
                                   placeholder="Practice" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </template>

                    <template v-slot:ratings_section>
                        <div class="ratting-section">
                            <h5>Rating</h5>
                            <p style="">4.5</p>
                        </div>
                    </template>
                </user-card>
                <section-card style="flex-grow: 1" class="ml-[20px] h-[auto]"
                              :heading="'Doctor\'s Bio'">
                    <div class="sect-2 appointment-details">
                        <p v-if="mode == 'view_mode'" class="w-[100%] h-[270px]" style="overflow: auto">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Accusamus animi assumenda autem
                            deserunt dolore eius enim error et eveniet ex exercitationem incidunt inventore ipsa libero
                            minima nostrum nulla numquam obcaecati odit porro qui, quidem quis ratione tempora, tempore
                            vel,
                            voluptates?
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi assumenda autem
                            deserunt dolore eius enim error et eveniet ex exercitationem incidunt inventore ipsa libero
                            minima nostrum nulla numquam obcaecati odit porro qui, quidem quis ratione tempora, tempore
                            vel,
                            voluptate
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi assumenda autem
                            deserunt dolore eius enim error et eveniet ex exercitationem incidunt inventore ipsa libero
                            minima nostrum nulla numquam obcaecati odit porro qui, quidem quis ratione tempora, tempore
                            vel,
                            voluptate</p>
                        <textarea v-model="doctor.bio" style="width: 100%;min-height:320px;border: 1px solid lightgrey;border-radius: 8px" >

                        </textarea>
                    </div>
                </section-card>
            </div>
            <div class="dual-section" style="height: 300px">
                <section-card style="max-width:800px" :heading="'Security'">
                    <div class="w-[auto]">
                        <form @submit.prevent="change_password" class="admin_form">
                            <div class="input-group mb-3">
                                <span class="input-group-text w-[200px]" id="basic-addon1">Current Password</span>
                                <input v-model="passwordForm.current_password" type="password" autocomplete="off" class="form-control" placeholder="Current password"
                                       aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text w-[200px]" id="basic-addon1">New Password</span>
                                <input v-model="passwordForm.new_password" type="password" autocomplete="off" class="form-control" placeholder="New Password"
                                       aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text w-[200px]" id="basic-addon1">Confirm New Password</span>
                                <input v-model="passwordForm.confirm_current_password" type="password" autocomplete="off" class="form-control" placeholder="New Password"
                                       aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <button class="button-fill p-[10px] block m-[auto]">Update Password</button>
                        </form>
                    </div>
                </section-card>
            </div>
        </div>
    </Layout>
</template>

<script>
import userCard from "../../../AppComponents/userCard.vue";
import sectionCard from "../../../AppComponents/sectionCard.vue";

export default {
    name: "doctorForm",
    components: {
        userCard,
        sectionCard
    },
    props:['account'],
    data(){
        return {
            mode:'edit_mode',
            doctor:this.$inertia.form({
                name: this.account.name,
                email: this.account.email,
                phone: this.account.phone,
                address: this.account.address,
                practice: this.account.practice,
                date_of_birth: this.account.date_of_birth,
                gender: this.account.gender,
                bio: this.account.notes,
                file:null,
            }),
            passwordForm:this.$inertia.form({
                current_password:null,
                new_password:null,
                confirm_current_password:null,
            })
        }
    },
    methods:{
        update_doctor(){
            this.doctor.post(route('put_doctor'))
        },
        change_password(){
            this.doctor.post(route('update_password'))
        }
    }
}
</script>

<style scoped lang="scss">
.ratting-section {
    width: 100%;
    height: 50px;
    margin-bottom: 20px;

    p {
        font-weight: bolder;
        font-size: 1.4em;
        color: var(--primarry-color-blue);
        padding-left: 20px;
    }

}

.details-section {
    span, label {
        width: 100px;
    }

    .input-group {
        input, select, textarea {
            border: 1px solid #d2d0d0;
        }
    }
}
</style>
