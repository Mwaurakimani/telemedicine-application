<template>
    <section id="dashboard-sidebar">
        <div class="buttons-section">
            <ul @click="rerender_elem">
                <Link :href="route('dashboard')" :class="[navigation.$state.active_tab == 'Dashboard' ? 'active_button':'']" as="li">
                    <p>Dashboard </p>
                </Link>
                <Link :href="route('list_appointments')" :class="[navigation.$state.active_tab == 'Appointments' ? 'active_button':'']" as="li">
                    <p>Appointments</p>
                </Link>
                <Link :href="route('list_patients')" :class="[navigation.$state.active_tab == 'Patients' ? 'active_button':'']" as="li">
                    <p>Patients</p>
                </Link>
                <Link :href="route('list_doctors')" :class="[navigation.$state.active_tab == 'Doctors' ? 'active_button':'']" as="li">
                    <p>Doctors</p>
                </Link>
                <Link :href="route('open_notifications')" :class="[navigation.$state.active_tab == 'Notifications' ? 'active_button':'']" as="li">
                    <p>Notifications</p>
                </Link>
                <Link :href="route('open_settings')" :class="[navigation.$state.active_tab == 'Settings' ? 'active_button':'']" as="li">
                    <p>Settings</p>
                </Link>
            </ul>
        </div>
    </section>
</template>
<script>
import {Link} from "@inertiajs/inertia-vue3";
import {useSidebarNavigationStore} from "../../Store/sideBarNavigaionStore";

export default {
    setup(){
        const navigation = useSidebarNavigationStore()


        return { navigation }
    },
    name: 'side-nav',
    props: ['user'],
    components: {
        Link
    },
    mounted() {
        let current_url = window.location.pathname
    }

}
</script>
<style lang="scss" scoped>
body {
    overflow: hidden;
}

#dashboard-sidebar {
    width: 280px;
    height: 100vh;
    display: flex;
    background-color: #00B4CF;
}
.buttons-section{
    width: 100%;
    padding-top: 120px;
    ul{
        width: 100%;
        .active_button{
            background-color:white;
            color: var(--primarry-color-blue);
        }
        li{
            height: 40px;
            display: flex;
            align-items: center;
            padding-left: 20px;
            font-weight: bolder;
            color: white;
            &:hover{
                cursor: pointer;
                background-color: var(--primarry-color-blue-darken);
                color: white;
            }
        }
    }
}

.active_tab{
    background-color: red;
}

</style>
