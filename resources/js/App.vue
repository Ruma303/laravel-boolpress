<template>
    <div>
        <!-- Navbar -->
        <NavBar></NavBar>
        <!-- <h1>Front office with Vue</h1> -->
        <!-- Main -->
        <main>
            <router-view></router-view>
        </main>

        <!-- Footer -->
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
    /* data(){
        return{
            arrPosts : [],
        };
    },
    created(){
        axios.get('/api/posts')
        .then(response => this.arrPosts = response.data.results)
    } */
}
</script>

<style lang="scss">
</style>
