<template>
  <div class="card p-4 w-100 shadow-lg border-radius-20px">
    <div class="d-flex align-items-center justify-content-center mb-4">
      <i class="fa fa-video-camera fa-3x me-2"></i>
      <div class="fs-1 fw-bold">iVid</div>
    </div>
    <form @submit.prevent="sign_in" class="px-md-5 mb-4">
      <div class="form-floating mb-3">
        <input :class="{'is-invalid': form.errors.email}" v-model="form.email" type="email" class="form-control"
               id="email"
               placeholder="name@example.com">
        <label for="email">Email address</label>
        <div class="invalid-feedback text-center">{{ form.errors.email }}</div>
      </div>
      <div class="form-floating mb-3 position-relative">
        <input :class="{'is-invalid': form.errors.email}" v-model="form.password"
               :type="passwordVisible ? 'text' : 'password'" class="form-control" id="password"
               placeholder="Password">
        <label for="password">Password</label>
        <i @click="passwordVisible = !passwordVisible"
           :class="{'text-primary': passwordVisible, 'text-black': !passwordVisible}"
           class="fa fa-eye position-absolute end-0 top-50 translate-middle-y me-3 cursor-pointer"></i>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary fw-bold py-1 px-4 fs-5 border-radius-20px text-white">
          Sign In
        </button>
      </div>
    </form>
    <div class="fs-6 text-center line-height-normal">
      Don't have an account?<br/>Click here to
      <Link :href="$route('show_sign_up')" class="text-decoration-none">Sign Up</Link>
      .
    </div>
  </div>
</template>

<script>
export default {
  name: "SignInComponent",
  data() {
    return {
      passwordVisible: false,
      form: this.$inertia.form({
        email: '',
        password: ''
      })
    }
  },
  methods: {
    sign_in() {
      this.form.post(this.$route('sign_in'));
    }
  }
}
</script>

<style scoped>

</style>
