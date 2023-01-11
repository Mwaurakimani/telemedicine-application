import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import inject from '@rollup/plugin-inject';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        // {
        //     name:'backend',
        //     handleHotUpdate({file, server}) {
        //         if(file.endsWith('.php')){
        //             server.ws.send({
        //                 type:'full-reload',
        //                 path: '*'
        //             })
        //         }
        //     }
        // },
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        inject({
            $: 'jquery',
        }),
    ],
});
