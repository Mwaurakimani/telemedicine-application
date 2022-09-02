<template>
    <Layout>
        <dashboard-page-heading :pageTitle="'Notifications'">
        </dashboard-page-heading>
        <div class="notification_panel">
            <div class="list-panel">
                <div v-for="item in 20" class="user-chat-card">
                    <div class="image-tab">

                    </div>
                    <div class="description-tab">
                        <h4>Username</h4>
                        <p>Lorem ipsum dolor sit...</p>
                    </div>
                </div>
            </div>
            <div class="message-panel">
                <div class="message-banner">
                    <p>Username</p>
                </div>
                <div class="message-body">
                    <div class="message-box">
                        <div class="text-bubble">
                            <p>Message test ....</p>

                        </div>
                        <span>8/5/2022 01:20 pm</span>
                    </div>
                    <div class="message-box">
                        <div class="text-bubble">
                            <p>Message test ....</p>

                        </div>
                        <span>8/5/2022 01:20 pm</span>
                    </div>
                    <div class="message-box">
                        <div class="text-bubble">
                            <p>Message test ....</p>

                        </div>
                        <span>8/5/2022 01:20 pm</span>
                    </div>
                    <div class="message-box">
                        <div class="text-bubble">
                            <p>Message test ....</p>

                        </div>
                        <span>8/5/2022 01:20 pm</span>
                    </div>
                    <div class="message-box right-align">
                        <div class="text-bubble ">
                            <p>Message test ....</p>
                        </div>
                        <span>8/5/2022 01:20 pm</span>
                    </div>
                </div>
                <form @submit.prevent="" class="chat-entry">
                    <textarea>

                    </textarea>
                    <button class="button-fill">Send</button>
                </form>
            </div>
        </div>
    </Layout>
</template>

<script>
export default {
    name: "notificationsHome",
    mounted(){
    }
}
</script>

<style scoped lang="scss">

.notification_panel{
    width: 98%;
    height: calc(100vh - 200px);
    background-color: white;
    margin: auto;
    box-shadow: 0 0 6px lightgrey;
    border-radius: 8px;
    overflow: hidden;
    display: flex;

    .list-panel{
        padding-top: 10px;
        width: 300px;
        height: 100%;

        .user-chat-card{
            width: 90%;
            height: 80px;
            background-color: white;
            margin: auto;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            padding-left: 10px;
            color: grey;
            border-radius: 8px;
            &:hover{
                color: white;
                background-color: #00B4CF;
            }

            .image-tab{
                width: 55px;
                height: 55px;
                border-radius: 50%;
                margin-right: 10px;
                border: 1px solid grey;
            }

            p{
                width: 180px;
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 4;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }
    }
    .message-panel{
        width: calc(100% - 300px);
        height: 100%;
        background-color: #f3fcfd;
        position: relative;
        .message-banner{
            width: 100%;
            height: 50px;
            background-color: white;
            box-shadow: 4px 0px 4px lightgrey;
            display: flex;
            align-items: center;

            P{
                font-weight: bolder;
                font-size: 1.2em;
                margin-left: 20px;
            }
        }
        .message-body{
            width: 100%;
            height: calc(100% - 120px);

            .message-box{
                width: 100%;
                display: flex;
                padding: 5px;
                color: grey;
                flex-direction: column;
                .text-bubble{
                    align-self: start;
                    max-width: 70%;
                    background-color: #49d57d;
                    border-radius: 15px;
                    border-bottom-left-radius: 0px;
                    padding: 10px;

                    p{
                        color: white;
                    }

                }
                span{
                    padding:3px 5px 0px;
                    display: block;
                    width: 100%;
                    text-align: left;
                    font-size: 0.7em;
                }
            }
            .right-align{
                justify-content: right;

                .text-bubble{
                    align-self: end;
                    background-color: #00B4CF;
                    border-bottom-left-radius: 15px;
                    border-bottom-right-radius: 0px ;
                }
                span{
                    text-align: right;
                }
            }
        }
        .chat-entry{

            bottom: 0px;
            position: absolute;
            width: 100%;
            box-shadow: 4px -2px 6px #e3e3e3;
            padding: 5px;
            display: flex;

            textarea{
                flex-grow: 1;
                width: 100%;
                overflow: auto;
                border-radius: 8px;
                color: lightgrey;
                height: 70px;
                color: grey;
            }

            button{
                width: 80px;
                padding: 5px;
                margin-left: 10px;
            }
        }
    }


}

</style>
