const mix = require('laravel-mix');

mix
/** Assets Admin */

    .sass('resources/views/admin/assets/scss/dashboard/main.scss', 'public/backend/assets/css/main.css')
    .sass('resources/views/admin/assets/scss/dashboard/sidebar-themes.scss', 'public/backend/assets/css/sidebar-themes.css')
    .sass('resources/views/admin/assets/scss/custom-admin/style.scss', 'public/backend/assets/css/style.css')

    .styles([
        'node_modules/bootstrap/dist/css/bootstrap.css',
        'node_modules/bootstrap-select/dist/css/bootstrap-select.css',
        'node_modules/@fortawesome/fontawesome-free/css/all.css',
        'node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css',
        'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
        'node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.css',
    ], 'public/backend/assets/css/libs.css')

    .styles([
        'resources/views/admin/assets/css/login.css',
    ], 'public/backend/assets/css/login.css')

    .scripts([
        'resources/views/admin/assets/js/login.js'
    ], 'public/backend/assets/js/login.js')

    .scripts([
        'node_modules/jquery/dist/jquery.min.js'
    ], 'public/backend/assets/js/jquery.js')

    .scripts([
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        'node_modules/bootstrap-select/dist/js/bootstrap-select.js',
        'node_modules/bootstrap-select/dist/js/i18n/defaults-pt_BR.min.js',
        'node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
        'node_modules/datatables.net/js/jquery.dataTables.js',
        'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
        'node_modules/datatables.net-responsive/js/dataTables.responsive.js',
        'node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.js',
        'node_modules/jquery-mask-plugin/dist/jquery.mask.js',
        'node_modules/chart.js/dist/Chart.js',
        'node_modules/chart.js/dist/Chart.bundle.js',
    ], 'public/backend/assets/js/libs.js')

    .scripts([
        'resources/views/admin/assets/js/scripts.js'
    ], 'public/backend/assets/js/scripts.js')

    .scripts([
        'resources/views/admin/assets/js/dashboard.chart.js'
    ], 'public/backend/assets/js/dashboard.chart.js')

    .copyDirectory('resources/views/admin/assets/img', 'public/backend/assets/img')
    .copyDirectory('resources/views/admin/assets/fonts', 'public/backend/assets/fonts')

    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/backend/assets/webfonts')

    .options({
        processCssUrls: false
    })

    .version()
;

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
