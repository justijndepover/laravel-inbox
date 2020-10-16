import Vue from "vue"
import Router from "vue-router"

Vue.use(Router);

export default new Router({
    mode: "history",
    base: "/inbox",
    routes: [
        {
            path: "/:id",
            name: "mail",
            component: require("../pages/Mail.vue").default,
        },
        {
            path: "*",
            component: require("../pages/NoMail.vue").default,
        },
    ],
});