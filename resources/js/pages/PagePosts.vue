<template>
    <div v-if="results">
        <h1>Index dei posts</h1>
        <div class="row">
            <ul class="cards-div">
                <li v-for="post in results.data"
                :key="post.id"
                class="li-card"
                >
                    <img :src="post.image"
                        :alt="post.title"
                        class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{post.title}}</h5>
                        <router-link :to="{name: 'postsShow', params:{slug: post.slug}}"
                        class="btn btn-primary"
                        >Read</router-link>
                    </div>
                </li>
            </ul>
        </div>
        <nav class="mt-4">
            <ul class="pagination">
                <li
                class="page-item pag-button"
                :class="{disabled : results.current_page === 1}"
                @click="changePage(results.current_page -1)">

                    <span class="page-link">Previous</span></li>

                <!-- *Tutte le pagine in ordine crescente-->
                <li v-for="page in results.last_page"
                :key="page"
                class="page-item pag-button"
                :class="{active : results.current_page === page}"
                @click="changePage(page)">

                    <span class="page-link">{{ page }}</span></li>

                <li
                class="page-item pag-button"
                :class="{disabled : results.current_page === results.last_page}"
                @click="changePage(results.current_page +1)">

                    <span class="page-link">Next</span></li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'PagePosts',
    data(){
        return{
            results : null,
        };
    }, methods: {
        changePage(page) {
            axios.get('/api/posts?page=' + page)
                .then(response => {
                    this.results = response.data.results;
                    scrollTo(0,0);
                }
            )
        }
    },
    created(){
        this.changePage(1);
    }
}
</script>

<style lang="scss" scoped>
.pag-button{
    cursor: pointer;
}
</style>
