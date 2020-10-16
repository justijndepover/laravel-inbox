import Vue from "vue"
import Router from "vue-router"

Vue.use(Router);

var path = 'inbox';

if (document.head.querySelector('meta[name="base-path"]')) {
    path = document.head.querySelector('meta[name="base-path"]').content;
}

export default new Router({
    mode: "history",
    base: "/" + path,
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