<template>
    <div class="user-table-card white_container_card">
        <div class="image-section flex justify-center p-[5px]">
            <img v-if="user.profile_photo_path == null" class="flex items-center justify-center h-[100%] p-[1px]"  src="/storage/SystemFiles/Images/defualt_user_image.png" alt="">
            <img v-else-if="user.account_type == 'Doctor'" class="flex items-center justify-center h-[100%] p-[1px]"  :src="'/storage/DoctorImages/'+user.profile_photo_path" alt="">
            <img v-else-if="user.account_type == 'Patient'" class="flex items-center justify-center h-[100%] p-[1px]"  :src="'/storage/PatientImages/'+user.profile_photo_path" alt="">
        </div>
        <h3>{{ user.username }}</h3>
<!--        <p>Last_name</p>-->
        <span class="block">{{ user.email }}</span>
        <Link as="button" class="p-[5px]" :href="route(router_link,user.id)">
            <img src="/storage/systemFiles/icons/eye.png" alt="">
        </Link>
    </div>
</template>

<script>
export default {
    name: "userTableCard",
    props:['router_link','user']
}
</script>

<style scoped lang="scss">
.user-table-card {
    width: 220px;
    height: 300px;
    background-color: white;
    overflow: hidden;
    margin-bottom: 20px;

    .image-section {
        width: 100%;
        height: 200px;
        margin-bottom: 5px;
    }

    h3 {
        padding: 0px;
        margin: 0px;
        padding-left: 5px;
        font-weight: bolder;
        font-size: large;
        color: grey;
    }

    p {
        padding: 0px;
        margin: 0px;
        padding-left: 5px;
        margin-bottom: 5px;
        color: grey;
        font-size: 0.95em;
    }

    span {
        font-size: 0.8em;
        padding: 5px;
        color: grey;
    }

    button {
        float: right;
        margin-right: 15px;
        display: block;
        position: relative;
        height: 35px;
        width: 35px;
        border-radius: 50%;
        background-color: var(--primarry-color-blue);
    }
}
</style>
