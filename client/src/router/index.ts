import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/login',
            component: () => import("@/pages/Login.page.vue")
        },
        {
            path: '/register',
            component: () => import("@/pages/Register.page.vue")
        }
    ]
})

export default router
