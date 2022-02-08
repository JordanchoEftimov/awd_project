<template>
    <div>
        <Navbar class="sticky-top"/>
        <slot></slot>
        <Footer class="position-absolute bottom-0 w-100"/>
    </div>
</template>

<script>
import Navbar from "../Components/Navbar";
import Footer from "../Components/Footer";

export default {
    name: "DefaultLayout",
    components: {Footer, Navbar}
}
</script>

<style scoped>

</style>
