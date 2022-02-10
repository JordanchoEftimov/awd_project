<template>
    <div class="background">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col col-12 col-xl-6 pt-5 mb-4 mb-xl-0">
                    <div
                        class="display-2 text-center text-xl-start fw-bold text-primary d-flex align-items-center line-height-normal">
                        Add Captions to your youtube videos!
                    </div>
                    <div class="d-flex justify-content-center justify-content-xl-start">
                        <div class="custom-hr bg-primary mb-4"></div>
                    </div>
                    <p class="fs-4 text-dark line-height-normal text-center text-xl-start mb-3">
                        Add your youtube videos and create subtitles for them.<br class="d-none d-xl-block"/>
                        It's easy and free.<br class="d-none d-xl-block"/>
                        <span v-if="!$page.props.user">Start by creating your account here.</span>
                        <span v-else>Start by adding your youtube video.</span>
                    </p>
                    <div class="d-flex justify-content-center justify-content-xl-start">
                        <Link :href="$route('sign_up')"
                              v-if="!$page.props.user"
                              class="btn btn-primary border-radius-20px text-decoration-none text-white fs-4 fw-bold px-4">
                            Get Started
                        </Link>
                        <Link
                              v-else
                              class="btn btn-primary border-radius-20px text-decoration-none text-white fs-4 fw-bold px-4">
                            Create Video
                        </Link>
                    </div>
                </div>
                <div class="col col-12 col-xl-6">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <img src="/images/homepage-image.svg" alt="Homepage Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DefaultLayout from "../Layouts/DefaultLayout";

export default {
    name: "Homepage",
    layout: DefaultLayout
}
</script>

<style scoped>
.background {
    background-image: url("../../../public/images/background.svg");
    min-height: calc(100vh - 110px);
    background-size: cover;
    min-width: 100vw;
}

.custom-hr {
    width: 30%;
    height: 0.3rem;
}
</style>
