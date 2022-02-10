<template>
    <div class="min-vh-100 position-relative">
        <Navbar class="sticky-top"/>
        <div class="pb-5">
            <slot></slot>
        </div>
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
