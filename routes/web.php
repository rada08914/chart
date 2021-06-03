<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/index',[
    App\Http\Controllers\ReportingController::class,
    'index'
]);
route::get('/order',[
    App\Http\Controllers\ReportingController::class,
    'order'
]);
route::get('/3',[
    App\Http\Controllers\ReportingController::class,
    'num3'
]);
route::get('/4',[
    App\Http\Controllers\ReportingController::class,
    'num4'
]);
route::get('/5',[
    App\Http\Controllers\ReportingController::class,
    'num5'
]);