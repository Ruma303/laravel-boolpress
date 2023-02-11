<template>
    <div class="grid">
        <div class="tile">
            <div v-for="post in arrRandom" :key="post.id">
                <router-link :to="{name: 'postsShow', params: {slug: post.slug}}">
                    <img :src="post.image" :alt="post.title" class="col-4">
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
        .then(response => this.arrRandom = response.data.results);
    }
}
</script>

<style lang="scss" scoped>
.grid {
    margin: 1rem auto;
    .tile {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        flex: 0 0 calc(100% / 3);
        height: calc(100% / 3);
    }
    img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        }
}
</style>
