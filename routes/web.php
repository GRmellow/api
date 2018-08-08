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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'v1'], function($router)
{
    
    $router->group(['prefix' => 'tasks', 'middleware' => 'auth'], function($router)
    {
        $router->post('/create', 'PostsController@create');

        $router->get('/show/{id}', 'PostsController@view');

        $router->put('/edit/{id}', 'PostsController@update');

        $router->delete('/delete/{id}', 'PostsController@delete');

        $router->get('/index', 'PostsController@index');
    });


    $router->post('login', 'UsersController@login');

    $router->group(['prefix' => 'users'], function($router)
    {
        
        $router->get('show/{id}', 'UsersController@view');

        $router->put('edit/{id}', 'UsersController@update');

        $router->delete('delete/{id}', 'UsersController@delete');

        $router->get('index', 'UsersController@index');
    });

});