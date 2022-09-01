import './bootstrap';
import '../css/app.css';
import '../scss/index.scss';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { Link } from "@inertiajs/inertia-vue3";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Telementary Application';

const application = createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mixin({
                components: {
                    Link
                }
            })
            .mount(el)
    },
});

InertiaProgress.init({ color: '#4B5563' });
