<template>
    <div class="top-nav">
        <h1>{{ title }}</h1>
        <Link as="h1" :href="'/'">
            <img src="/storage/SystemFiles/icons/home.png" alt="">
        </Link>
    </div>
</template>

<script>
export default {
    name: "mobileNav",
    props:['title']
}
</script>

<style lang="scss" scoped>
.top-nav{
    width: 100%;
    height: 50px;
    background-color: #2bd225;
    color: white;
    line-height: 50px;
    padding: 10px;
    font-size: 1.3em;
    font-weight: bolder;
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;

    img{
        width: 30px;
    }
}
</style>
