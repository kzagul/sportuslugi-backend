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

// User
Route::get('/api/users', [Controller::class, 'users']);

// Role
Route::get('/api/roles', [Controller::class, 'roles']);

// User services
Route::get('/api/users/services',  [Controller::class, 'services']);

// Institution
Route::get('/api/institutions', [InstitutionController::class, 'getInstitutions']);
Route::get('/api/institution/id={institution_id}', [InstitutionController::class, 'getInstitution']);
Route::get('/api/institution/name={institution_name}', [InstitutionController::class, 'getInstitutionByName']);
Route::post('/api/institution', [InstitutionController::class, 'postInstitution']);
Route::put('api/institution/{institution_id}', [InstitutionController::class, 'putInstitution']);
Route::delete('api/institution/{institution_id}', [InstitutionController::class, 'deleteInstitution']);

// Service
Route::get('api/services', [ServiceController::class, 'getServices']);
Route::get('api/service/id={service_id}', [ServiceController::class, 'getService']);
Route::post('api/service', [ServiceController::class, 'postService']);
Route::put('api/service/{service_id}', [ServiceController::class, 'putService']);
Route::delete('api/service/{service_id}', [ServiceController::class, 'deleteService']);

// Sport
Route::get('/api/sports', [SportController::class, 'getSports']);
// Route::get('api/sport/{sport_id}', [SportController::class, 'getSport']);
Route::get('/api/sport/id={sport_id}', [SportController::class, 'getSport']);
Route::post('api/sport', [SportController::class, 'postSport']);
Route::put('api/sport/{sport_id}', [SportController::class, 'putSport']);
Route::delete('api/sport/{sport_id}', [SportController::class, 'deleteSport']);