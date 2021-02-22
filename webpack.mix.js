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
    'public/theme/plugins/font-awesome/css/font-awesome.min.css',
    'public/theme/fonts/Linearicons/Linearicons/Font/demo-files/demo.css',
    'public/theme/plugins/bootstrap4/css/bootstrap.min.css',
    'public/theme/plugins/owl-carousel/assets/owl.carousel.css',
    'public/theme/plugins/slick/slick/slick.css',
    'public/theme/plugins/lightGallery-master/dist/css/lightgallery.min.css',
    'public/theme/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css',
    'public/theme/theme/plugins/jquery-ui/jquery-ui.min.css',
    'public/theme/plugins/select2/dist/css/select2.min.css',
    'public/theme/css/style.css',

],'public/css/all.css');

// <script src="{{ asset('theme/')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <script src="{{ asset('')}}"></script>
// <!-- custom scripts-->
// <script src="{{ asset('js/main.js')}}"></script>
// <script src="{{ asset('js/zoomsl.js')}}"></script>


mix.scripts([
    'public/theme/plugins/jquery-1.12.4.min.js',
    'public/theme/plugins/popper.min.js',
    'public/theme/plugins/owl-carousel/owl.carousel.min.js',
    'public/theme/plugins/bootstrap4/js/bootstrap.min.js',
    'public/theme/plugins/bootstrap4/js/bootstrap.min.js',
    'public/theme/plugins/imagesloaded.pkgd.min.js',
    'public/theme/plugins/masonry.pkgd.min.js',
    'public/theme/plugins/isotope.pkgd.min.js',
    'public/theme/plugins/jquery.matchHeight-min.js',
    'public/theme/plugins/slick/slick/slick.min.js',
    'public/theme/plugins/slick-animation.min.js',
    'public/theme/plugins/lightGallery-master/dist/js/lightgallery-all.min.js',
    'public/theme/plugins/jquery-ui/jquery-ui.min.js',
    'public/theme/plugins/sticky-sidebar/dist/sticky-sidebar.min.js',
    'public/theme/plugins/jquery.slimscroll.min.js',
    'public/theme/plugins/select2/dist/js/select2.full.min.js',
    'public/theme/plugins/gmap3.min.js',
    'public/theme/extra-lib/main.js',
    'public/theme/extra-lib/zoomsl.js',

],'public/js/all.js')
