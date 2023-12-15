import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
// resources/js/app.js

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/activity.scss',
                'resources/css/activityestablish.scss',
                'resources/css/app.scss',
                'resources/css/banner.scss',
                'resources/css/bannerestablish.scss',
                'resources/css/recommend.scss',
                'resources/css/the-datepicker.css',
                'resources/css/styleguide.css',
                'resources/css/globals.css',
                'resources/css/style.scss',
                'resources/css/frontpage.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
})
