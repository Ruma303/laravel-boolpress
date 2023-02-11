<template>
    <Page404 v-if="is404" />
    <div v-else-if="objPost" class="container-fluid post-div">
    <h1 class="post-title">{{ objPost.title }}</h1>
        <h2>Nella categoria: {{ objPost.category.name }}</h2>
        <div class="tags">
            <span v-for="tag in objPost.tags" :key="tag.id" class="tag">{{ tag.name }} </span>
        </div>
        <img :src="objPost.image" :alt="objPost.title">
        <p>{{ objPost.content }}</p>
    </div>
    <div v-else>Loading...</div>
</template>

<script>
import Page404 from './Page404.vue'
export default {
    components: {Page404},
    props: [
        'slug',
    ],
    data(){
        return{
            objPost : null,
            is404: false,
        };
    },
    created(){
        axios.get('/api/posts/' + this.slug).then(response => {
            if (response.data.success) {
            this.objPost = response.data.results;
            } else {
                this.is404 = true;
            }
        });},
}
</script>

<style scoped>
.post-div{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    width: 100%;
    margin: 0 auto;
    gap: 1rem;
    padding: 1.4rem 5rem;
}
.post-title{
    text-transform: uppercase;
}
.tag {
    display: inline-block;
    padding: .2rem .5rem;
    margin: 0 .1rem;
    border-radius: 15px;
    background-color: aqua;
}
</style>
