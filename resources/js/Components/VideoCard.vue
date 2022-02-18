<template>
    <div class="card shadow border-radius-10px">
        <div class="card-body">
            <div class="row">
                <div class="col col-4">
                    <img class="img-fluid border-radius-10px"
                         :src="'https://img.youtube.com/vi/' + videoId + '/sddefault.jpg'"
                         alt="Youtube Video Thumbnail">
                </div>
                <div class="col col-8 d-flex flex-column">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="fw-bold fs-5 text-truncate">
                            {{ video.title }}
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle fs-7 text-decoration-none text-muted" role="button"
                               id="options-link"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Options
                            </a>

                            <ul class="dropdown-menu p-0" aria-labelledby="options-link">
                                <li class="dropdown-item d-flex align-items-center fs-6">
                                    <Link class="dropdown-item" :href="$route('videos.show', video)">
                                        <i class="fa fa-eye me-3"></i>Watch
                                    </Link>
                                </li>
                                <li class="dropdown-item d-flex align-items-center fs-6">
                                    <Link class="dropdown-item" :href="$route('videos.edit', video)">
                                        <i class="fa fa-pencil me-3"></i>Edit
                                    </Link>
                                </li>
                                <li class="dropdown-item d-flex align-items-center fs-6">
                                    <div data-bs-toggle="modal"
                                         data-bs-target="#deleteModal"
                                         :data-bs-video-id="video.id"
                                         class="dropdown-item cursor-pointer">
                                        <i class="fa fa-trash me-3"></i>Delete
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-auto">
                        <div class="fs-7 text-muted text-end">
                            <div>
                                Created At
                            </div>
                            <div>
                                {{ new Date(video.created_at).toLocaleDateString() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "VideoCard",
    props: {
        video: {
            type: Object
        }
    },
    computed: {
        videoId() {
            if (!this.video.url) return null;
            if (this.video.url.indexOf('v=') === -1) return null;
            let video_id = this.video.url.split('v=')[1];
            let ampersandPosition = video_id.indexOf('&');
            if (ampersandPosition !== -1) {
                video_id = video_id.substring(0, ampersandPosition);
            }
            return video_id
        },
    }
}
</script>

<style scoped>
.fs-7 {
    font-size: 0.7rem;
}
</style>
