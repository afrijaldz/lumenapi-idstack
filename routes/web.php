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

use Illuminate\Support\Str;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function () {
    return Str::random(32);
});

$router->get('/get', function () {
    return 'GET';
});

$router->post('/post', function () {
    return 'POST';
});

$router->put('/put', function () {
    return 'PUT';
});

$router->patch('/patch', function () {
    return 'PATCH';
});

$router->delete('/delete', function () {
    return 'DELETE';
});

$router->options('/options', function () {
    return 'OPTIONS';
});

$router->get('/user/{id}', function ($id) {
    return 'User id = ' . $id;
});

$router->get('/post/{postId}/comments/{commentId}', function ($postId, $commentId) {
    return 'Post ID = ' . $postId . ' Comment ID = ' . $commentId;
});

// optional parameter
$router->get('/optional[/{param}]', function ($param = null) {
    return 'Ini optional param = ' . $param;
});

// route redirect
$router->get('/profile', function () {
    return redirect()->route('route.profile');
});

$router->get('/profile/idstack', ['as' => 'route.profile', function () {
    return route('route.profile');
}]);

// grouping
$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('home', function () {
        return 'Home Admin';
    });

    $router->get('profile', function () {
        return 'Profile Admin';
    });
});