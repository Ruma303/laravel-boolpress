<template>
    <div>
        <h1>Index dei posts</h1>
        <div class="row">
            <ul class="cards-div">
                <li v-for="post in arrPosts"
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
    </div>
</template>

<script>
export default {
    name: 'PagePosts',
    data(){
        return{
            arrPosts : [],
        };
    },
    created(){
        axios.get('/api/posts')
        .then(response => this.arrPosts = response.data.results)
    }
}
</script>

<style>

</style>
