const adminLogin = () => import('./components/Login.vue')
const adminDashboard = () => import('./components/Home.vue')
const home = () => import('./components/Home.vue')

export const routes = [
    {   
        path: '/',
        component: home,
        name: "home"
    },
    {   
        path: '/login',
        component: adminLogin,
        name: "adminLogin"
    },
    {
        path: '/dashboard',
        component: adminDashboard,
        name: "adminDashboard"
    },
];