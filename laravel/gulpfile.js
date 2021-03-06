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
	.copy('node_modules/flag-icon-css/flags', 'public/flags')
	.sass('app.scss')
	.browserify('app.js')
	.styles([
	    '../../../bower_components/flag-icon-css/css/flag-icon.min.css',
	    '../../../bower_components/v-tabs/dist/v-tabs.css',
	    '../../../node_modules/ng-dialog/css/ngDialog.css',
	    '../../../node_modules/ng-dialog/css/ngDialog-theme-default.css',
	    '../vendor/ng-dialog/ngDialog-theme-flat.css',
	], 'public/css/vendor.css')
	.styles([
	    '../vendor/login/form-elements.css',
	    '../vendor/login/style.css',
	], 'public/css/login.css')
	.scripts([
	    '../../../bower_components/v-tabs/dist/v-tabs.js',
	], 'public/js/vendor.js');
});
