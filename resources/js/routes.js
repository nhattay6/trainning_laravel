const topic = () => import('./components/Topic.vue')
const category = () => import('./components/Category.vue')
const home = () => import('./components/Home.vue')
const notFound = () => import('./components/NotFound.vue')

export const routes = [
    {   
        path: '/',
        component: home,
        name: "home"
    },
    {   
        path: '/category',
        component: category,
        name: "category"
    },
    {
        path: '/topic',
        component: topic,
        name: "topic"
    },
    {
        path: '*',
        compone: notFound ,
    },
];