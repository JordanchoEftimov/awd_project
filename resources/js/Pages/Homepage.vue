<template>
    <div></div>
</template>

<script>
import DefaultLayout from "../Layouts/DefaultLayout";

export default {
    name: "Homepage",
    layout: DefaultLayout
}
</script>

<style scoped>
div {
    background-image: url("../../../public/images/background.svg");
    min-height: calc(100vh - 110px);
    background-size: cover;
    min-width: 100vw;
}
</style>
