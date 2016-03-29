var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .scripts([
            'libs/jquery-2.2.2.js',
            'libs/bootstrap.js',
            'libs/sweetalert-dev.js'
        ],'./public/js/libs.js')
        .styles([
            'libs/sweetalert.css',
            'libs/bootstrap.css',
            'libs/bootstrap.min.css'
        ],'./public/css/libs.css');
});
