<?php



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->group(['prefix' => '/block'], function () use ($router) {
    $router->get('/', 'BlockController@index');
    $router->post('/', 'BlockController@store');
    $router->get('/{id}', 'BlockController@show');
    $router->put('/{id}', 'BlockController@update');
    $router->delete('/{id}', 'BlockController@destroy');
});

$router->group(['prefix' => '/condominium'], function () use ($router) {
    $router->get('/', 'CondominiumController@index');
    $router->post('/', 'CondominiumController@store');
    $router->get('/{id}', 'CondominiumController@show');
    $router->put('/{id}', 'CondominiumController@update');
    $router->delete('/{id}', 'CondominiumController@destroy');
});

