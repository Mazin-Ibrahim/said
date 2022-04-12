require("./bootstrap");

// import Vue from "vue";

// window.Vue = require("vue");
import Vue from "vue/dist/vue.js";
import { createInertiaApp } from "@inertiajs/inertia-vue";

// createInertiaApp({
//     resolve: (name) => require(`./Pages/${name}`),
//     setup({ el, app, props }) {
//         new Vue({
//             metaInfo: {
//                 titleTemplate: (title) => title,
//             },
//             render: (h) => h(app, props),
//         }).$mount(el);
//     },
// });

createInertiaApp({
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin);

        new Vue({
            render: (h) => h(App, props),
        }).$mount(el);
    },
});
