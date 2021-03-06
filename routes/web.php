<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('payment/{id}/link', 'PaymentController@link');

$router->get('payment/sum', 'PaymentController@sum');
$router->get('payment', 'PaymentController@show');
$router->get('payment/{id}', 'PaymentController@get');
$router->post('payment', 'PaymentController@create');
$router->delete('payment/{id}', 'PaymentController@delete');
$router->put('payment', 'PaymentController@update');
