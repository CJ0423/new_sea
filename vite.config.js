import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
// resources/js/app.js

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/front/a1.scss',
                'resources/css/front/a2.scss',
                'resources/css/front/a3.scss',
                'resources/css/front/b1.scss',
                'resources/css/front/b2.scss',
                'resources/css/front/b3.scss',
                'resources/css/front/c1.scss',
                'resources/css/front/c2.scss',
                'resources/css/front/d1.scss',
                'resources/css/front/d2.scss',
                'resources/css/front/app.scss',

                'resources/css/activitiesAdded.scss',
                'resources/css/activity.scss',
                'resources/css/activityChooseFixPattern.scss',
                'resources/css/activityestablish.scss',
                'resources/css/activityEstablishChosePattern.scss',
                'resources/css/activityrevise.scss',
                'resources/css/app.scss',
                'resources/css/banner.scss',
                'resources/css/bannerestablish.scss',
                'resources/css/bannerrevise.scss',
                'resources/css/createmenu.scss',
                'resources/css/editmenu.scss',
                'resources/css/frontpage.scss',
                'resources/css/globals.css',
                'resources/css/recommend.scss',
                'resources/css/recommendestablish.scss',
                'resources/css/recommendrevise.scss',
                'resources/css/style.scss',
                'resources/css/styleguide.css',
                'resources/css/the-datepicker.css',

                'resources/js/activityChooseFixPattern.js',
                'resources/js/activityDel-spe.js',
                'resources/js/activityDel.js',
                'resources/js/app.js',
                'resources/js/banner.js',
                'resources/js/bootstrap.js',
                'resources/js/fontpageicon.js',
                'resources/js/recommend.js',
            ],
            refresh: true,
        }),
    ],
})
