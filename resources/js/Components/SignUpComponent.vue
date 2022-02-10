<template>
    <div class="card p-4 w-100 shadow-lg border-radius-20px">
        <div class="d-flex align-items-center justify-content-center mb-4">
            <i class="fa fa-video-camera fa-3x me-2"></i>
            <div class="fs-1 fw-bold">iVid</div>
        </div>
        <form @submit.prevent="sign_up" class="px-md-5 mb-4">
            <div class="form-floating mb-3">
                <input :class="{'is-invalid': form.errors.name}" v-model="form.name" type="text" class="form-control"
                       id="name"
                       placeholder="Name">
                <label for="name">Name</label>
                <div class="invalid-feedback">{{ form.errors.name }}</div>
            </div>
            <div class="form-floating mb-3">
                <input :class="{'is-invalid': form.errors.email}" v-model="form.email" type="email" class="form-control"
                       id="email"
                       placeholder="name@example.com">
                <label for="email">Email address</label>
                <div class="invalid-feedback">{{ form.errors.email }}</div>
            </div>
            <div class="form-floating mb-3 position-relative">
                <input :class="{'is-invalid': form.errors.password}" v-model="form.password"
                       :type="passwordVisible ? 'text' : 'password'" class="form-control"
                       id="password"
                       placeholder="Password">
                <label for="password">Password</label>
                <div class="invalid-feedback">{{ form.errors.password }}</div>
                <i @click="passwordVisible = !passwordVisible"
                   :class="{'text-primary': passwordVisible, 'text-black': !passwordVisible, 'd-none': form.errors.password}"
                   class="fa fa-eye position-absolute end-0 top-50 translate-middle-y me-3 cursor-pointer"></i>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary fw-bold py-1 px-4 fs-5 border-radius-20px">
                    Create Account
                </button>
            </div>
        </form>
        <div class="fs-6 text-center line-height-normal">
            Already have an account?<br/>Click here to
            <Link :href="$route('show_sign_in')" class="text-decoration-none">Sign In</Link>
            .
        </div>
    </div>
</template>

<script>
export default {
    name: "SignUpComponent",
    data() {
        return {
            passwordVisible: false,
            form: this.$inertia.form({
                name: '',
                email: '',
                password: ''
            })
        }
    },
    methods: {
        sign_up() {
            this.form.post(this.$route('sign_up'))
        },
    }
}
</script>

<style scoped>

</style>
