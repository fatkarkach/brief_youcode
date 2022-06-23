import { createRouter, createWebHistory } from "vue-router";
import Home from "../view/Home.vue";
import Partenaire from "../view/Partenaire.vue";
import Suivi_benefices from "../view/Suivi_benefices.vue";
import login from "../view/login.vue";
import demande from "../view/demande.vue";
import partenaire1 from "../view/partenaire1.vue"
import Achat from "../view/Achat.vue";
import commandes from "../view/commandes.vue";
import boutiques from "../view/boutiques.vue";
import homeuser from "../viewUser/homeuser.vue";
import payementuser from "../viewUser/payementuser.vue";
import achatsuser from "../viewUser/achatsuser.vue";
import client from "../viewUser/client.vue";
const routes = [
    {
        path: "/",
        name: "login",
        component: login,
    },
    {
        path: "/client",
        name: "client",
        component: client,
    },
    {
        path: "/homeuser",
        name: "homeuser",
        component: homeuser,
    },
    {
        path: "/achatsuser",
        name: "achatsuser",
        component: achatsuser,
    },
    {
        path: "/payementuser",
        name: "payementuser",
        component: payementuser,
    },
    {
        path: "/commandes",
        name: "commandes",
        component: commandes,
    },
    {
        path: "/Achat",
        name: "Achat",
        component: Achat,
    },
    {
        path: "/partenaire1",
        name: "partenaire1",
        component: partenaire1,
    },
    {
        path: "/demande",
        name: "demande",
        component:demande,
    },
    {
        path: "/home",
        name: "Home",
        component: Home,
    },
    {
        path: "/Partenaire",
        name: "Partenaire",
        component: Partenaire,
    },
    {
        path: "/Suivi",
        name: "Suivi Bénéfices",
        component: Suivi_benefices,
    },
    {
        path: "/boutiques",
        name: "boutiques",
        component: boutiques,
    },
    {
        path:'/:NotFoud(.*)*',
        redirect:'/'
    }
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;