const mix = require('laravel-mix');

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

mix.styles([
    'resources/assets/front/bootstrap/css/bootstrap.min.css',
    'resources/assets/front/font-awesome/4.5.0/css/font-awesome.min.css',
    'resources/assets/front/ionicons/2.0.1/css/ionicons.min.css',
    'resources/assets/front/plugins/iCheck/minimal/_all.css',
    'resources/assets/front/plugins/datepicker/datepicker3.css',
    'resources/assets/front/plugins/select2/select2.min.css',
    'resources/assets/front/plugins/datatables/dataTables.bootstrap.css',
    'resources/assets/front/dist/css/AdminLTE.min.css',
    'resources/assets/front/dist/css/skins/_all-skins.min.css'
], 'public/css/front.css');

mix.scripts([
    'resources/assets/front/plugins/jQuery/jquery-2.2.3.min.js',
    'resources/assets/front/bootstrap/js/bootstrap.min.js',
    'resources/assets/front/plugins/select2/select2.full.min.js',
    'resources/assets/front/plugins/datepicker/bootstrap-datepicker.js',
    'resources/assets/front/plugins/datatables/jquery.dataTables.min.js',
    'resources/assets/front/plugins/datatables/dataTables.bootstrap.min.js',
    'resources/assets/front/plugins/slimScroll/jquery.slimscroll.min.js',
    'resources/assets/front/plugins/fastclick/fastclick.js',
    'resources/assets/front/plugins/iCheck/icheck.min.js',
    'resources/assets/front/dist/js/app.min.js',
    'resources/assets/front/dist/js/demo.js',
    'resources/assets/front/dist/js/scripts.js'
], 'public/js/front.js');
