<template>
    <div>
        <!-- Navbar -->
        <NavBar></NavBar>
        <h1>Front office with Vue</h1>
        <!-- Main -->
        <main>
            <router-view></router-view>
        </main>
        <!-- Footer -->
        <div class="row">
            <ul class="cards-div">
                <li v-for="post in arrPosts"
                :key="post.id"
                class="li-card">
                    <div class="card front-card">
                        <img
                        :src="post.image"
                        :alt="post.title"
                        class="card-img-top img-app">
                        <div class="card-body">
                            <h5 class="card-title">{{post.title}}</h5>
                            <p class="card-text">{{post.except}}</p>
                            <a :href="'/posts/'+ post.slug" class="btn btn-primary">Read</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <Footer />
    </div>
</template>

<script>
import NavBar from './components/NavBar.vue';
import Footer from './components/Footer.vue';
export default {
    name: 'App',
    components: {
        NavBar,
        Footer
    },
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

<style lang="scss">
</style>
