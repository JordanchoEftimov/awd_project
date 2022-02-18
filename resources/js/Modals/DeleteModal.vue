<template>
    <div
        class="modal fade"
        id="deleteModal"
        tabindex="-1"
        aria-hidden="true"
        ref="deleteModal"
    >
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-radius-20px">
                <div
                    class="
                            position-absolute
                            end-0
                            mt-4
                            me-3
                            d-flex
                            flex-row
                            align-items-center
                          "
                    style="z-index: 1500"
                >
                    <button
                        type="button"
                        class="btn-close btn-sm me-2"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body text-center">
                    <div class="fs-5 fw-bold line-height-normal mt-4">
                        Are you sure you want to<br/>
                        delete this video?
                    </div>
                    <div
                        class="
                              d-flex
                              flex-row
                              align-items-center
                              justify-content-center
                              mt-3
                            "
                    >
                        <input
                            class="form-check-input"
                            type="checkbox"
                            v-model="checked"
                            id="deleteAnyway"
                            value=""
                            aria-label="..."
                        />
                        <label for="deleteAnyway" class="body-std ms-2 pt-1"
                        >Delete anyway</label
                        >
                    </div>
                    <div
                        class="
                              d-flex
                              flex-row
                              justify-content-center
                              align-items-center
                              mt-3
                            "
                    >
                        <button
                            class="btn btn-outline-danger btn-subtle border-radius-10px me-2"
                            data-bs-dismiss="modal"
                        >
                            Cancel
                        </button>
                        <Link v-if="videoId" :href="$route('videos.destroy', videoId)" method="DELETE"
                              @click="modal.hide()"
                              class="btn btn-danger border-radius-10px"
                              :class="{'pointer-events-none': !checked}"
                        >
                            Delete
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Modal} from 'bootstrap';

export default {
    name: "DeleteModal",
    data() {
        return {
            checked: false,
            modal: null,
            videoId: null
        }
    },
    mounted() {
        this.modal = Modal.getOrCreateInstance(this.$refs.deleteModal);
        this.$refs.deleteModal.addEventListener("show.bs.modal", (event) => {
            this.checked = false;
            const button = event.relatedTarget;
            this.videoId = button.getAttribute(`data-bs-video-id`);
        });
    },
}
</script>

<style scoped>
.pointer-events-none {
    pointer-events: none;
    opacity: 0.7 !important;
    background: gray;
}
</style>
