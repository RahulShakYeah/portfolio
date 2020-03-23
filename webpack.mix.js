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

mix.js('resources/js/app.js', 'public/js')
    .autoload({
        jquery:['$','jquery','window.jquery'],
        "popper.js":['Popper']
    })
    .extract()
    .js('resources/js/blogger.js','public/js')
    .sass('resources/sass/blogger.scss','public/css')
    .sass('resources/sass/app.scss', 'public/css');
