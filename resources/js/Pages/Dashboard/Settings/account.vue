<template>
    <Layout>
        <template v-slot:mobile>
            <mobile-nav :title="'Account'"></mobile-nav>
            <div class="user-details">
                <div class="img-holder">

                </div>
                <div class="user-text">
                    <h3>{{ $attrs.user.name}}</h3>
                    <p>{{ $attrs.user.email }}</p>
                    <p>{{ $attrs.user.phone }}</p>
                </div>
            </div>

            <div class="password-change">
                <div class="input-group">
                    <label>Email</label>
                    <input v-model="userDetails.email">
                    <p class="form_error" >{{ $attrs.errors.email }}</p>
                </div>
                <div class="input-group">
                    <label>Phone</label>
                    <input v-model="userDetails.phone">
                    <p class="form_error" >{{ $attrs.errors.phone }}</p>
                </div>
            </div>
            <button @click="update_user_details">Confirm</button>

            <p style="color: red">Not changing password</p>
<!--            <div class="password-change">-->
<!--                <div class="input-group">-->
<!--                    <label>Password</label>-->
<!--                    <input type="password" v-model="security_details.password">-->
<!--                    <p class="form_error" >{{ $attrs.errors.password }}</p>-->
<!--                </div>-->
<!--                <div class="input-group">-->
<!--                    <label>New Password</label>-->
<!--                    <input type="password" v-model="security_details.newPassword">-->
<!--                    <p class="form_error" >{{ $attrs.errors.newPassword }}</p>-->
<!--                </div>-->
<!--                <div class="input-group">-->
<!--                    <label>confirm Password</label>-->
<!--                    <input type="password" v-model="security_details.newPassword_confirmation">-->
<!--                    <p class="form_error" >{{ $attrs.errors.newPassword_confirmation }}</p>-->
<!--                </div>-->
<!--            </div>-->

<!--            <button @click="update_security_details">Confirm</button>-->
        </template>
    </Layout>
</template>
<script>
import userCard from "../../../AppComponents/userCard.vue";
import sectionCard from "../../../AppComponents/sectionCard.vue";
import mobileNav from "../../../AppComponents/mobileNav.vue";

export default {
    name: 'appointment-card',
    components: {
        mobileNav,
        userCard,
        sectionCard
    },
    data() {
        return {
            userDetails: this.$inertia.form({
                email: null,
                phone: null,
            }),
            security_details: this.$inertia.form({
                password: null,
                newPassword: null,
                newPassword_confirmation: null,
            })
        }
    },
    methods: {
        update_user_details() {
            this.userDetails.post(route('updateUserDetails'))
        },
        update_security_details() {
            this.security_details.post(route('updateSecurityrDetails'))
        }
    }
}
</script>

<style scoped lang="scss">
.top-nav {
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

.user-details {
    width: 95%;
    margin: auto;
    display: flex;
    margin-bottom: 20px;

    .img-holder {
        margin-right: 10px;
        width: 100px;
        height: 100px;
        background-color: red;
    }

    .user-text {
        p {
            font-size: 0.9em;
            color: grey;
        }
    }
}

.password-change {
    width: 95%;
    margin: auto;
    margin-bottom: 40px;
    padding: 10px;
    box-shadow: 0 0 6px lightgrey;
    border-radius: 8px;

    .input-group {
        margin-bottom: 10px;

        label {
            color: grey;
            margin-bottom: 10px;
        }

        input {
            height: 35px;
            padding: 5px;
            width: 300px;
            border-radius: 5px !important;
            border: 1px solid lightgrey;
            margin-bottom: 2px;
        }
    }
}

button {
    display: block;
    width: 95%;
    padding: 10px;
    background-color: greenyellow;
    color: white;
    margin: auto;
    margin-bottom: 20px;
    border-radius: 8px;
}

.form_error{
    font-size: smaller;
    font-style: italic;
    width: 100%;
    display: block;
    color: red;
}
</style>



