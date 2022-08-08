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

 mix.js('resources/js/package.js', 'public/js')
 .copy('resources/backend/plugins/owl-carousel/owl.carousel.css','public/backend/css')
 .copy('resources/backend/plugins/mscrollbar/jquery.mCustomScrollbar.css','public/backend/css')
 .copy('resources/backend/plugins/sidebar/sidebar.css','public/backend/css')
 .copy('resources/backend/plugins/jqvmap/jqvmap.min.css','public/backend/css')
 .copy('resources/backend/css/sidemenu.css','public/backend/css')
 .copy('resources/backend/css/style.css','public/backend/css')
 .copy('resources/backend/css/style-dark.css','public/backend/css')
 .copy('resources/backend/css/skin-modes.css','public/backend/css')
 .copy('resources/backend/css/main.css','public/backend/css')
 .copy('resources/backend/img','public/backend/img')
 // js
 .copy('resources/backend/plugins/jquery/jquery.min.js','public/backend/js')
 .copy('resources/backend/plugins/bootstrap/js/bootstrap.bundle.min.js','public/backend/js')
 .copy('resources/backend/plugins/chart.js/Chart.bundle.min.js','public/backend/js')
 .copy('resources/backend/plugins/ionicons/ionicons.js','public/backend/js')
 .copy('resources/backend/plugins/moment/moment.js','public/backend/js')
 .copy('resources/backend/plugins/jquery-sparkline/jquery.sparkline.min.js','public/backend/js')
 .copy('resources/backend/plugins/raphael/raphael.min.js','public/backend/js')
 .copy('resources/backend/plugins/jquery.flot/jquery.flot.js','public/backend/js')
 .copy('resources/backend/plugins/jquery.flot/jquery.flot.pie.js','public/backend/js')
 .copy('resources/backend/plugins/jquery.flot/jquery.flot.resize.js','public/backend/js')
 .copy('resources/backend/plugins/jquery.flot/jquery.flot.categories.js','public/backend/js')
 .copy('resources/backend/js/dashboard.sampledata.js','public/backend/js')
 .copy('resources/backend/js/chart.flot.sampledata.js','public/backend/js')
 .copy('resources/backend/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js','public/backend/js')
 .copy('resources/backend/js/apexcharts.js','public/backend/js')
 .copy('resources/backend/plugins/rating/jquery.rating-stars.js','public/backend/js')
 .copy('resources/backend/plugins/rating/jquery.barrating.js','public/backend/js')
 .copy('resources/backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js','public/backend/js')
 .copy('resources/backend/plugins/perfect-scrollbar/p-scroll.js','public/backend/js')
 .copy('resources/backend/js/eva-icons.min.js','public/backend/js')
 .copy('resources/backend/plugins/sidebar/sidebar.js','public/backend/js')
 .copy('resources/backend/plugins/sidebar/sidebar-custom.js','public/backend/js')
 .copy('resources/backend/js/sticky.js','public/backend/js')
 .copy('resources/backend/js/modal-popup.js','public/backend/js')
 .copy('resources/backend/plugins/side-menu/sidemenu.js','public/backend/js')
 .copy('resources/backend/plugins/jqvmap/jquery.vmap.min.js','public/backend/js')
 .copy('resources/backend/js/index.js','public/backend/js')
 .copy('resources/backend/js/apexcharts.js','public/backend/js')
 .copy('resources/backend/js/custom.js','public/backend/js')
 .copy('resources/backend/js/jquery.vmap.sampledata.js','public/backend/js')
 .copy('resources/backend/plugins/jqvmap/maps/jquery.vmap.usa.js','public/backend/js')
 .copy('resources/js/alert.js', 'public/js')
     //frontend
     .copy('resources/frontend/css','public/css')
     .copy('resources/frontend/js','public/js')
     .copy('resources/frontend/img','public/img')
     .copy('resources/frontend/scss','public/scss')
     .copy('resources/frontend/fonts','public/fonts')
     .copy('resources/frontend/Doc','public/Doc')

   .sourceMaps();
