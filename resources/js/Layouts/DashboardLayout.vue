<template>
    <div id="dashboard-display" style="overflow:hidden">
        <side-nav  :key="componentKey" :user="$attrs.user" @reload_comp = 'rerender_component'/>
        <section id="dashboard-content">
            <top-navigation/>
            <slot></slot>
        </section>
    </div>
    <div class="mobile-view" style="overflow: auto" >
        <slot name="mobile"></slot>
    </div>
</template>

<script>
import SideNav from "./Dashboard/SideNav.vue";
import TopNavigation from "./Dashboard/TopNavigation.vue";

export default {
    components: {
        TopNavigation,
        SideNav
    },

    data(){
        return {
            componentKey: true
        }
    },
    methods:{
        rerender_component(){
            this.componentKey = !this.componentKey
        },
    },
    mounted() {
        console.log(this.$attrs)
    }
}
</script>

<style lang='scss'>

#dashboard-display {
    width: 100vw;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

#dashboard-content {
    width: calc(100vw - 285px);
    height: 100vh;
    background-color: #F6F5F5;
    overflow-y: auto;
}

.info-bubble{
    position: absolute;
    bottom:30px;
    right: 0;
    width: 400px;
    min-height: 80px;
    border-radius: 8px;
    background-color: white;
    box-shadow: 0 0 6px grey;
    overflow: hidden;
    .info{
        border-left:red 10px solid;
        width: 100%;
        height: calc(80px - 4px);
        display: flex;
        padding:5px;
        align-items: center;
    }
    .strip{
        height: 4px;
        width: 400px;
        background-color: red;

    }
}

@media only screen and (max-width: 425px){
    #dashboard-display{
        display: none;
    }
}
</style>
