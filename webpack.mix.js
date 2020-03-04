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
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
      'public/assets/css/quill.snow.css',
      'public/assets/css/tree.css',
], 'public/css/all.css');    

mix.scripts([
      'public/assets/js/quill.min.js', 
      'public/assets/js/setting.js'
], 'public/js/all.js');
 
//mix.browserSync('http://localhost:8000/');