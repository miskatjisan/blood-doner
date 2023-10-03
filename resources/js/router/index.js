import { createWebHistory, createRouter } from 'vue-router';

const Home = () => import('../components/Home.vue');
const MyPost = () => import('../components/MyPost.vue');
const SearchResults = () => import('../components/SearchResults.vue');
const RequestDonate = () => import('../components/RequestDonate.vue');
const BloodRequest = () => import('../components/BloodRequest.vue');
const Intarest = () => import('../components/Intarest.vue');

const routes = [

    {
        name: "home",
        path: '/',
        component: Home,
        meta: {
            title: `Home`
        }
    },

    {
        name: "mypost",
        path: '/mypost',
        component: MyPost,
        meta: {
            title: `My Post`
        }
    },

    {
        path: '/search-results',
        name: 'SearchResults',
        component: SearchResults,
    },

    {
    path: '/request-donate',
    name: 'request-donate',
    component: RequestDonate,
    },

    {
    path: '/blood-request',
    name: 'blood-request',
    component: BloodRequest,
    },
     
    {
        path: '/intarest',
        name: 'intarest',
        component: Intarest,
        },

    
     
]




const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

export default router;