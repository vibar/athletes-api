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

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

$router->group(['prefix' => 'categories'], function () use ($router) {
    $router->get('', CategoryController::class.'@index');
    $router->get('{id}', CategoryController::class.'@show');
    $router->post('', CategoryController::class.'@store');
    $router->put('{id}', CategoryController::class.'@update');
    $router->delete('{id}', CategoryController::class.'@destroy');
});

$router->group(['prefix' => 'athletes'], function () use ($router) {
    $router->get('', UserController::class.'@index');
    $router->get('{id}', UserController::class.'@show');
    $router->post('', UserController::class.'@store');
    $router->put('{id}', UserController::class.'@update');
    $router->delete('{id}', UserController::class.'@destroy');
});
