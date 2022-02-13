<template>
    <div class="container py-5">
        <h1 class="text-center display-4 fw-bold mb-4">Create your Video</h1>
        <form @submit.prevent>
            <div class="row">
                <div class="col col-12" :class="{'col-md-12': !videoId, 'col-md-6': videoId}">
                    <div class="form-floating mb-3">
                        <input v-model="form.url" type="text" class="form-control" id="url" placeholder="Video URL">
                        <label for="url">Youtube Video URL</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input v-model="form.title" type="text" class="form-control" id="title"
                               placeholder="Video Title">
                        <label for="title">Youtube Video Title</label>
                    </div>
                    <iframe v-if="form.url" style="width: 100%" height="534"
                            :src="'https://www.youtube.com/embed/' + videoId"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
                <div v-if="videoId" class="col col-12 col-md-6 mb-4 mb-md-0">
                    <div class="fs-4 text-center fw-bold mb-3">Add your Captions</div>
                    <div class="mb-3">
                        <div class="input-group mb-3">
                            <div class="w-50 pe-1">
                                <input min="0" step="1" :class="{'is-invalid': from.error}" v-model="from.value"
                                       type="number"
                                       class="form-control"
                                       placeholder="Caption From (in seconds)">
                                <div class="invalid-feedback">Please insert a value for this field.</div>
                            </div>
                            <div class="w-50 ps-1">
                                <input min="0" step="1" :class="{'is-invalid': to.error}" v-model="to.value"
                                       type="number"
                                       class="form-control"
                                       placeholder="Caption To (in seconds)">
                                <div class="invalid-feedback">Please insert a value for this field.</div>
                            </div>
                        </div>
                        <textarea :class="{'is-invalid': description.error}" v-model="description.value"
                                  class="form-control" placeholder="Subtitle"></textarea>
                        <div class="invalid-feedback">Please insert a value for this field.</div>
                    </div>
                    <button @click="addNewSubtitle" class="btn btn-primary border-radius-10px text-white text-end mb-3">
                        Add Subtitle
                    </button>
                    <div class="table-responsive" v-if="form.subtitles.length">
                        <table class="table table-striped table-hover">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th>From</th>
                                <th>To</th>
                                <th>Subtitle</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="align-middle" v-for="(subtitle, i) in form.subtitles" :key="i">
                                <td>{{ subtitle.from }}s</td>
                                <td>{{ subtitle.to }}s</td>
                                <td>{{ subtitle.description }}</td>
                                <td>
                                    <button @click="removeSubtitle(i)"
                                            class="btn btn-sm btn-outline-danger border-radius-10px"><i
                                        class="fa fa-close"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg text-white border-radius-10px px-4">
                Create Video
            </button>
        </form>
    </div>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout";

export default {
    name: "Create",
    layout: DefaultLayout,
    data() {
        return {
            form: this.$inertia.form({
                url: '',
                title: '',
                subtitles: []
            }),
            from: {
                value: '',
                error: false
            },
            to: {
                value: '',
                error: false
            },
            description: {
                value: '',
                error: false
            }
        }
    },
    methods: {
        addNewSubtitle() {
            this.to.error = this.to.value === '';
            this.from.error = this.from.value === '';
            this.description.error = this.description.value === '';
            if (this.to.error === true || this.from.error === true || this.description.error === true) return
            this.form.subtitles.push({
                from: this.from.value,
                to: this.to.value,
                description: this.description.value
            })
            this.from.value = ''
            this.to.value = ''
            this.description.value = ''
        },
        removeSubtitle(id) {
            this.form.subtitles.splice(id, 1);
        }
    },
    computed: {
        videoId() {
            if (!this.form.url) return null;
            let video_id = this.form.url.split('v=')[1];
            let ampersandPosition = video_id.indexOf('&');
            if (ampersandPosition !== -1) {
                video_id = video_id.substring(0, ampersandPosition);
            }
            return video_id
        }
    },
}


</script>

<style scoped>
input, textarea {
    border: 1px solid black;
}

textarea {
    height: 150px;
}
</style>
