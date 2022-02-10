<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient">
        <div class="container">
            <Link class="navbar-brand text-white d-flex align-items-center" :href="$route('homepage')"><i
                class="fa fa-video-camera fa-2x me-2"></i>
                <div class="fs-4 fw-bold">iVid</div>
            </Link>
            <button class="navbar-toggler border border-1 border-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-content" aria-controls="navbar-content"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                    <Link :method="nav_link.name === 'Sign Out' ? 'post': 'get'" :href="nav_link.route"
                          v-for="(nav_link, i) in nav_links" :key="i"
                          :class="{'d-none': !nav_link.show}"
                          class="nav-item me-lg-2 d-flex align-items-center justify-content-center text-decoration-none">
                        <i class="fa fa-2x text-white text-stroke me-2 me-lg-0" :class="nav_link.icon"></i>
                        <div class="nav-link text-white fs-5 fw-bold text-stroke"
                             :class="{'me-md-2 me-lg-4': i < nav_links.length}">
                            {{ nav_link.name }}
                        </div>
                    </Link>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Navbar",
    data() {
        return {
            nav_links: [
                {
                    name: 'Home',
                    route: this.$route('homepage'),
                    icon: 'fa-home',
                    show: true
                },
                {
                    name: 'Sign In',
                    route: this.$route('show_sign_in'),
                    icon: 'fa-sign-in',
                    show: !this.$page.props.user
                },
                {
                    name: 'Get Started',
                    route: this.$route('show_sign_up'),
                    icon: 'fa-user-plus',
                    show: !this.$page.props.user
                },
                {
                    name: 'My Videos',
                    route: '',
                    icon: 'fa-video-camera',
                    show: this.$page.props.user
                },
                {
                    name: 'Create Video',
                    route: '',
                    icon: 'fa-plus-circle',
                    show: this.$page.props.user
                },
                {
                    name: 'Sign Out',
                    route: this.$route('sign_out'),
                    icon: 'fa-sign-out',
                    show: this.$page.props.user
                }
            ]
        }
    },
}
</script>

<style scoped>
.text-stroke {
    text-shadow: -0.5px -0.5px 0 #413d3d,
    0.5px -0.5px 0 #413d3d,
    -0.5px 0.5px 0 #413d3d,
    0.5px 0.5px 0 #413d3d;
}
</style>
