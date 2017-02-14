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

// NOTE uncomment this file if you don't want get "*.map" files
// elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.sass('app.scss', 'public/assets/css/app.css');
});

elixir(function(mix) {
    mix.scripts(['App/*.js', 'App/*/*.js', 'app.js'], 'public/assets/js/app.js');
});

elixir(function(mix) {
    mix.copy('resources/assets/img', 'public/assets/img');
});
