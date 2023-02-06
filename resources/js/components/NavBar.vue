<template>
   <div>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container-fluid">
            <router-link :to="{name: 'home'}" class="navbar-brand">Bollpress</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <router-link :to="{name: 'postsIndex'}" class="nav-link">Posts</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name: 'about'}" class="nav-link">About</router-link>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-light" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>
    </div>
</template>

<script>
export default {
    name:  'NavBar'
};
</script>

<style lang="scss" scoped>

</style>
