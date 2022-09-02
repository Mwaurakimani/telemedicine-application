<template>
    <div class="page-header">
        <div class="top-nav">
            <div class="heading-section">
                <h2>{{ pageTitle }}</h2>
            </div>
            <div class="action-buttons">
                <slot name="action_buttons"></slot>
            </div>
        </div>
        <div class="bottom-nav">
            <slot name="page_heading_bottom"></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "dashboardPageHeading",
    props:[
        'pageTitle'
    ],

}
</script>

<style scoped lang="scss">

.page-header{
    margin: auto;
    width: 98%;
    margin-bottom: 20px;
    .top-nav{
        width: 100%;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        .heading-section{
            h2{
                font-weight: bold;
                font-size: 1.5em;
                color: #484848;
            }
        }

        .action-buttons{
            height: 60px;
        }
    }

    .bottom-nav{
        width: 100%;
        max-height: 200px;
    }
}

</style>
