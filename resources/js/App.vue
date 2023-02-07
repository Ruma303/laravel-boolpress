<template>
    <div>
        <!-- Navbar -->
        <NavBar></NavBar>
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
    }
}
</script>

<style lang="scss">
</style>
