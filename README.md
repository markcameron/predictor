# EURO 2016 Predictor

Simple predictor game where you can predict the scores for each game of the EURO 2016 championship in France.

Built with Laravel and AngularJS

## Install

Clone predictor and `cd` into the laravel folder, copy `.env.example` to `.env` and edit to setup your database, and Mail settings, then run:

```
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
$ npm install
$ gulp --production
```
Then you should be able to navigate to the site in the browser and login with the default access permissions

	Login: default@example.com
	password: asd

If you want to use facebook login you'll need to configure a facebook application and setup the `FACEBOOK_` values in the `.env` file.
