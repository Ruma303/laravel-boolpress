require('./common');
import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import PageHome from './pages/PageHome.vue';
import PageAbout from './pages/PageAbout.vue';
import PagePost from './pages/PagePost.vue';
import PagePosts from './pages/PagePosts.vue';
import Page404 from './pages/Page404.vue'
import PageContactUs from './pages/PageContactUs.vue';
Vue.use(VueRouter);

const routes = [
    { path: '/', component: PageHome, name: 'home' },
    { path: '/about', component: PageAbout, name: 'about' },
    { path: '/posts', component: PagePosts, name: 'postsIndex', props:true },
    { path: '/posts/:slug', component: PagePost, name: 'postsShow', props:true },
    { path: '/contact-us', name: 'contactUs', component: PageContactUs },
    { path: '*', name: 'page404', component: Page404 },
];

// Personalizzazione del Vue Router
const router = new VueRouter({
    mode: 'history',
    routes,
});

new Vue({
    el: '#root',
    render: h => h(App),
    router
})
