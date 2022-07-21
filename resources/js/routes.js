const adminLogin = () => import('./components/Login.vue')
const dashboard = () => import('./components/Temp.vue')
const home = () => import('./components/Home.vue')

export const routes = [
    {   
        path: '/',
        component: adminLogin,
        name: "adminLogin"
    },
    {   
        path: '/login',
        component: adminLogin,
        name: "adminLogin"
    },
    {
        path: '/dashboard',
        component: dashboard,
        name: "dashboard"
    },  
    {
        path: '/auth/:provider/callback',
        // component: {
        //     template: '<div class="auth-component"></div>'
        // }
        component: dashboard,
    },

];