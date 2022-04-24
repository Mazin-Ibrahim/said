require("./bootstrap");

// import Vue from "vue";

// window.Vue = require("vue");
import Vue from "vue/dist/vue.js";
import { createInertiaApp } from "@inertiajs/inertia-vue";
// import { InertiaProgress } from '@inertiajs/progress'

Vue.mixin({ methods: { route: window.route } })
// InertiaProgress.init()



createInertiaApp({
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin);

        new Vue({
            render: (h) => h(App, props),
        }).$mount(el);
    },
});


require('./bootstrap');

