<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

Route::group(['prefix' => 'v1'], function (Router $router) {
    $router->group(['prefix' => 'auth'], function (Router $router) {
        $router->post('login', [LoginController::class, 'login'])->name('login');
    });
});
