<template>
    <nav v-if="links.length > 3" aria-label="Page navigation example">
        <ul class="pagination justify-content-center mb-0">
            <li class="page-item" :class="{'active':link.active, 'disabled': !link.url}" v-for="(link, k) in links"
                :key="k">
                <Link class="page-link" v-if="link.url" :href="link.url" tabindex="-1" v-html="link.label"/>
                <span class="page-link" v-else v-html="link.label"/>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Pagination",
    props: {
        links: Array,
        required: true
    }
}
</script>
