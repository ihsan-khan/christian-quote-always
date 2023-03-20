import { createRouter, createWebHistory } from 'vue-router';
import index from './views/Index.vue';
import blogs from './views/Blogs.vue';
import contact from './views/Contact.vue';
import store from './store';
import * as auth from './services/auth_service';

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
    },
    {
        path: '/login',
        name: 'login',
        component: () => import ('./views/authentication/Login.vue'),
        beforeEnter(to, from, next) {
            if (auth.isLoggedIn()) {
                if (auth.getUserRole() === 'user') {
                    next('/home');
                }
                if (auth.getUserRole() === 'admin') {
                    next('/admin');
                }
            } else {
                next();
            }
        }
    },
    {
        path: '/register',
        name: 'register',
        component: () => import ('./views/authentication/Register.vue'),
        beforeEnter(to, from, next) {
            if (auth.isLoggedIn()) {
                if (auth.getUserRole() === 'user') {
                    next('/home');
                }
                if (auth.getUserRole() === 'admin') {
                    next('/admin');
                }
            } else {
                next();
            }
        }
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
