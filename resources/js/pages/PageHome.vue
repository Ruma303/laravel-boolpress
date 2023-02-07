<template>
    <!-- <h1>Home</h1> -->
    <div class="grid">
        <div v-for="post in arrRandom" :key="post.id">
            <router-link :to="{name: 'postsShow', params:{slug: post.slug}}">
                <!-- :src="'/storage/' + post.uploaded_img" -->
                <img
                :src="posts.image"
                :alt="post.title">
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PageHome',
    data(){
        return {
            arrRandom:null,
        }
    },
    created(){
        axios.get('api/posts/random')
        .then(response => this.arrRandom = response.data.results );
    }
}
</script>

<style>

</style>
