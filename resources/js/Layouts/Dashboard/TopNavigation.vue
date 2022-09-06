<template>
    <section id="dashboard-navigation">
        <div class="time-display">
            <div class="time">
                <div class="date-display">
                    <p class="mr-[10px]">Friday</p>
                    <p>22</p>
                    <p>-</p>
                    <p>08</p>
                    <p>-</p>
                    <p>2022</p>
                </div>

                <div class="time-display">
                    <p>01</p>
                    <p>:</p>
                    <p>20</p>
                    <p>PM</p>
                </div>
            </div>
        </div>
        <div class="account-action-section flex justify-end ">
            <button class="app-btn" @click="logout">Log out</button>
        </div>
    </section>
</template>
<script>
export default {
    name: 'top-navigation',
    methods:{
        logout(){
            axios.post('/logout')
                .then(
                    window.location.href = '/'
            );
        }
    }
}
</script>
<style lang="scss">

#dashboard-navigation{
  margin-bottom: 15px;
  top: 0px;
  position: sticky;
  z-index: 1000;
  background-color: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
    .time-display{
        height: 50px;
        display: flex;

        .time{
            width: 300px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding-left: 100px;
            font-weight: bolder;
            color: grey;

            .date-display{
                width: 200px;
                height: 500px;
                display: flex;
                align-items: center;
                margin-right: 20px;
            }

            .time-display{
                width: 200px;
                height: 40px;
                display: flex;
                align-items: center;
            }
        }
    }

    .account-action-section{
        width: 300px;
        height: 50px;
        //background-color: grey;
        margin-right: 30px;
    }
}
</style>
