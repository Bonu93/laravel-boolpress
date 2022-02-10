import Vue from 'vue';
import VueRouter from 'vue-router';

//PAGES
import Blog from './pages/Blog';
import Home from './pages/Home';
import PostDetail from './pages/PostDetail';

Vue.use(VueRouter);

//ROUTES
const router = new VueRouter({
    mode: 'history', 
    linkExactActiveClass: 'active', 
    routes: [
        {
            path: '/blog',
            name: 'blog', 
            component: Blog
        },
        {
            path: '/',
            name: 'home', 
            component: Home
        },
        {
            path: '/blog/:slug',
            name: 'post-detail', 
            component: PostDetail
        },
    
    
    
    ],

});

export default router;