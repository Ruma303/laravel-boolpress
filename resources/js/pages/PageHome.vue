<!-- <router-link :to="{name: 'postsShow', params:{slug: post.slug}}"> -->
<!-- :src="'/storage/' + post.uploaded_img" -->
<template>
    <div class="grid">
        <div class="tile">
            <div v-for="post in arrRandom" :key="post.id">
                <router-link :to="{name: 'postsShow', params: {slug: post.slug}}">
                    <img :src="post.image" :alt="post.title">
                </router-link>
            </div>
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

<style scoped lang="scss">
.grid {
    display: flex;
    flex-wrap: wrap;
    height: 70vh;
.tile {
    flex: 0 0 calc(100% / 3);
    height: calc(100% / 3);
    img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    }
    }
}
</style>
