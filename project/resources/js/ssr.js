import { createSSRApp, h } from 'vue';
import { renderToString } from '@vue/server-renderer';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from 'ziggy-js';
import vuetify from './plugins/vuetify';

createInertiaApp({
    resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob('./pages/**/*.vue')),
    setup({ App, props, plugin }) {
        return createSSRApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(vuetify);
    },
}).then(({ app }) => renderToString(app));
