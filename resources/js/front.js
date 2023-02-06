require('./common');
import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import PageHome from './pages/PageHome.vue';
import PageAbout from './pages/PageAbout.vue';
import PagePost from './pages/PagePost.vue';
import PagePosts from './pages/PagePosts.vue';
import Page404 from './pages/Page404.vue'
Vue.use(VueRouter); // Usare il plugin

const routes = [
    { path: '/', component: PageHome, name: 'home' },
    { path: '/about', component: PageAbout, name: 'about' },
    { path: '/posts', component: PagePosts, name: 'postsIndex' },
    { path: '/posts/:slug', component: PagePost, name: 'postsShow', props: true},
    { path: '*', name: 'page404', component: Page404}
];

// Personalizzazione del Vue Router
const router = new VueRouter({routes});

new Vue({
    el: '#root',
    render: h => h(App),
    mode: history,
    router
})
