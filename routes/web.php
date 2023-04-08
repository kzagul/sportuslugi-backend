<?php

use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';

Route::get('/api', function () {
    return ['Sport api'];
});

Route::get('/api/usluga', function () {
    return ['Sport api'];
});

Route::get('/api/institutions', [Controller::class, 'institutions']);

Route::get('/api/users', [Controller::class, 'users']);
