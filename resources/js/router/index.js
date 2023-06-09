import { createRouter, createWebHistory } from "vue-router";

// Views
import Login from "../pages/Login";
import Developer from "../pages/Developer";
import Project from "../pages/Project";

// WebHistory
const history = createWebHistory();

const routes = [
    {
        path: "",
        component: Project,
        name: "home",
        meta: {
            title: "Welcome",
        },
    },
    {
        path: "/login",
        component: Login,
        name: "login",
        meta: {
            title: "Login",
        },
    },
    {
        path: "/developers",
        component: Developer,
        name: "developers",
        meta: {
            title: "Developers",
        },
    },
    {
        path: "/projects",
        component: Project,
        name: "projects",
        meta: {
            title: "Projects",
        },
    },
];

const router = createRouter({
    history,
    routes,
});

export default router;
