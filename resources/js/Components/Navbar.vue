<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-gradient">
        <div class="container">
            <Link class="navbar-brand text-white d-flex align-items-center" href="/"><i
                class="fa fa-video-camera fa-2x me-2"></i>
                <div class="fs-4 fw-bold">iVid</div>
            </Link>
            <button class="navbar-toggler border border-1 border-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-content" aria-controls="navbar-content"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0 text-center">
                    <li v-for="(nav_link, i) in nav_links" :key="i" class="nav-item me-md-4 d-flex align-items-center justify-content-center">
                        <i class="fa fa-2x text-white text-stroke me-2 me-md-0" :class="nav_link.icon"></i>
                        <Link class="nav-link text-white fs-5 fw-bold text-stroke"
                              :class="{'me-md-2 me-lg-4': i < nav_links.length}">
                            {{ nav_link.name }}
                        </Link>
                    </li>
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
                    route: '/',
                    icon: 'fa-home'
                },
                {
                    name: 'Sign In',
                    route: '',
                    icon: 'fa-sign-in'
                },
                {
                    name: 'Get Started',
                    route: '',
                    icon: 'fa-user-plus'
                }
            ]
        }
    }
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
