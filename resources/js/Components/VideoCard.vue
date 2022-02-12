<template>
    <div class="card shadow border-radius-10px">
        <div class="card-body">
            <div class="row">
                <div class="col col-4">
                    <img class="img-fluid border-radius-10px"
                         src="https://img.youtube.com/vi/GJTtiYMdMtk/sddefault.jpg" alt="Youtube Video Thumbnail">
                </div>
                <div class="col col-8 d-flex flex-column">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="fw-bold fs-5">
                            Video Title Here
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle fs-7 text-decoration-none text-muted" role="button"
                               id="options-link"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Options
                            </a>

                            <ul class="dropdown-menu p-0" aria-labelledby="options-link">
                                <li class="dropdown-item d-flex align-items-center fs-6">
                                    <i class="fa fa-eye"></i>
                                    <Link class="dropdown-item" href="#">Watch</Link>
                                </li>
                                <li class="dropdown-item d-flex align-items-center fs-6">
                                    <i class="fa fa-pencil"></i>
                                    <Link class="dropdown-item" href="#">Edit</Link>
                                </li>
                                <li class="dropdown-item d-flex align-items-center fs-6">
                                    <i class="fa fa-trash"></i>
                                    <div class="dropdown-item">Delete</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-auto">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="fs-7 text-muted">
                                <div>
                                    Video Duration
                                </div>
                                <div>
                                    02:01:30
                                </div>
                            </div>
                            <div class="fs-7 text-muted text-end">
                                <div>
                                    Created At
                                </div>
                                <div>
                                    21/01/2022
                                </div>
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
    }
}
</script>

<style scoped>
.fs-7 {
    font-size: 0.7rem;
}
</style>
