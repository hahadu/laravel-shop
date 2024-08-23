<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1'], function (Router $router) {
    $router->group(['prefix' => 'admin'], function (Router $router) {

    });
    $router->group(['prefix' => 'app'], function (Router $router) {

    });
});
