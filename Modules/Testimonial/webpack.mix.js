const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'modules/js/testimonial.js')
    .sass(__dirname + '/Resources/assets/sass/app.scss', 'modules/css/testimonial.css');

if (mix.inProduction()) {
    mix.version();
}
