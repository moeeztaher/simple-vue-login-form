import { createRouter, createWebHistory } from "vue-router";
import FormView from '../components/FormView.vue'
import Login from '../components/Login.vue'
import NewForm from '../components/NewForm.vue'

const routes = [
    {
        path: '/',
        name: 'NewForm',
        component: NewForm,
        alias: '/newform'
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/formView',
        name: 'FormView',
        component: FormView
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router 