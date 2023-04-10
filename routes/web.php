<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SportController;
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

Route::get('/api/users', [Controller::class, 'users']);

// Institution
Route::get('/api/institutions', [InstitutionController::class, 'getInstitutions']);
Route::get('/api/institution/{institution_id}', [InstitutionController::class, 'getInstitution']);
Route::get('/api/institution/{institution_name}', [InstitutionController::class, 'getInstitutionByName']);
Route::post('/api/institution', [InstitutionController::class, 'postInstitution']);

// Service
Route::get('api/services', [ServiceController::class, 'getServices']);
Route::get('api/service/{service_id}', [ServiceController::class, 'getService']);
Route::post('api/service', [ServiceController::class, 'postService']);

// Sport
Route::get('/api/sports', [SportController::class, 'getSports']);