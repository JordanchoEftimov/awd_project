<template>
    <div class="container py-5">
        <h3 class="display-5 text-center fw-bold mb-4">{{ video.title }}</h3>

        <div class="row">
            <div class="col col-12 col-md-8 mx-auto">
                <div class="position-relative">
                    <youtube @playing="playing" @paused="paused" v-if="videoId" :video-id="videoId"
                             :fitParent="true" ref="youtube"></youtube>
                    <div v-if="subtitleToShow"
                         style="bottom: 40px"
                         class="position-absolute start-50 w-75 text-center translate-middle-x bg-dark text-white px-2 py-1 fs-6">
                        {{ subtitleToShow }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout";

export default {
    name: "Show",
    layout: DefaultLayout,
    data() {
        return {
            time: 0,
            subtitleToShow: null
        }
    },
    props: {
        video: Object
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
        player() {
            return this.$refs.youtube.player;
        }
    },
    watch: {
        time: function () {
            for (let i = 0; i < this.video.subtitles.length; i++) {
                if (this.video.subtitles[i].from < this.time && this.video.subtitles[i].to > this.time) {
                    this.subtitleToShow = this.video.subtitles[i].description;
                    break;
                } else {
                    this.subtitleToShow = null
                }
            }
        }
    },
    methods: {
        async playing() {
            this.processId = setInterval(() => {
                this.player.getCurrentTime().then((time) => {
                    this.time = time;
                });
            }, 100);
        },
        pauseVideo() {
            this.player.pauseVideo();
        },
        paused() {
            clearInterval(this.processId);
        },
    }
}
</script>

<style scoped>

</style>
