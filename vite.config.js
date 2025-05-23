import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server:{
        host:true,
        hmr:{
            host: '2554-114-10-148-170.ngrok-free.app/',
        },
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
