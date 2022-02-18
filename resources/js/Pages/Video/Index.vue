<template>
    <div class="container py-5">
        <div
            class="d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-between mb-4">
            <div class="display-6 mb-3 mb-sm-0">My Videos</div>
            <Link :href="$route('videos.create')" class="btn btn-primary border-radius-20px fw-bold text-white px-4">
                Create Video
            </Link>
        </div>
        <div class="row" v-if="videos.data.length">
            <div v-for="video in videos.data" :key="video.id" class="col col-12 col-md-6 col-xl-4 mb-4">
                <VideoCard :video="video"/>
            </div>
            <Pagination :links="videos.links"/>
        </div>
        <div v-else class="text-center">
            <div class="display-6 mt-5 mb-3">
                There are no videos yet.
            </div>
            <div class="fs-3 text-muted">
                Start by creating your video for free
                <Link :href="$route('videos.create')">here</Link>
                .
            </div>
        </div>
        <DeleteModal/>
    </div>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout";
import VideoCard from "../../Components/VideoCard";
import Pagination from "../../Components/Pagination";
import DeleteModal from "../../Modals/DeleteModal";

export default {
    name: "Index",
    components: {DeleteModal, Pagination, VideoCard},
    layout: DefaultLayout,
    props: {
        videos: Object
    }
}
</script>

<style scoped>

</style>
