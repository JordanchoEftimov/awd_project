<template>
    <DefaultLayout>
        <div class="bg-gradient py-5">
            <div v-if="$page.component === 'Auth/SignUp'">
                <h2 class="display-4 text-white text-center">Create New Account</h2>
                <h3 class="fs-4 text-white text-center">Create your account and start<br/>adding subtitles to your
                    youtube
                    videos.</h3>
            </div>
            <div v-else-if="$page.component === 'Auth/SignIn'">
                <h2 class="display-4 text-white text-center">Sign In</h2>
                <h3 class="fs-4 text-white text-center">Sign In into your account and start<br/>adding subtitles to your
                    youtube
                    videos.</h3>
            </div>
        </div>
        <div class="container">
            <div class="row py-5">
                <div class="col col-12 col-md-8 col-lg-6 mx-auto">
                    <slot></slot>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script>
import DefaultLayout from "./DefaultLayout";

export default {
    name: "AuthLayout",
    components: {DefaultLayout},
}
</script>

<style scoped>

</style>
