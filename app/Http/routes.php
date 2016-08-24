<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

define('ROUTE_BASE', 'lumen/public/');
$app->get(ROUTE_BASE.'/', function () use ($app) {
    return $app->version();
});
$app->get(ROUTE_BASE.'site/captcha', 'SiteController@captcha');
$app->get(ROUTE_BASE.'site/login', 'SiteController@login');
