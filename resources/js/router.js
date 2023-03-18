import { createRouter, createWebHistory } from 'vue-router';
import index from './views/Index.vue';
import blogs from './views/Blogs.vue';
import contact from './views/Contact.vue';

const routes = [
    {
        path: '/',
        name: 'Index',
        component: index
    },
    {
        path: '/blogs',
        name: 'Blogs',
        component: blogs
    },
    {
        path: '/contact',
        name: 'Contact',
        component: contact
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
