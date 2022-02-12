<template>
    <div class="container py-5">
        <div
            class="d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-between mb-4">
            <div class="display-6 mb-3 mb-sm-0">My Videos</div>
            <Link class="btn btn-primary border-radius-20px fw-bold text-white px-4">Create Video</Link>
        </div>
        <div class="row">
            <div v-for="i in 20" class="col col-12 col-md-6 col-xl-4 mb-4">
                <VideoCard/>
            </div>
        </div>
    </div>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout";
import VideoCard from "../../Components/VideoCard";

export default {
    name: "Index",
    components: {VideoCard},
    layout: DefaultLayout
}
</script>

<style scoped>

</style>
