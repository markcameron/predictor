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
    mix
	.copy('node_modules/flag-icon-css/css/flag-icon.min.css', 'public/css/vendor.css')
	.copy('node_modules/flag-icon-css/flags', 'public/flags')
	.sass('app.scss')
	.browserify('app.js');
});
