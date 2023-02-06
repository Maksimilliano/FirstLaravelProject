const mix = require('laravel-mix');
//mix.js('src/app.js', 'dist').setPublicPath('dist');

mix.styles([
'resources/front/css/bootstrap.css',
'resources/front/css/main.css'
],  'public/css/styles.css');

mix.scripts([
    'resources/front/js/jquery.slim.js',
    'resources/front/js/bootstrap.js'
], 'public/js/scripts.js');


mix.copyDirectory('resources/front/img', 'public/img');

mix.browserSync('laravel.loc');
