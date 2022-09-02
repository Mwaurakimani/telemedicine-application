<template>
    <div class="appointment-details-card section white_container_card">
        <h1>{{ heading }}</h1>
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "sectionCard",
    props:['heading']
}
</script>

<style scoped lang="scss">

.section{
    padding: 20px;
    h1{
        font-weight: bolder;
        font-size: 1.2em;
        margin-bottom: 10px;
        color: dimgrey;
    }

}

</style>
