<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProfillulusanController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});

Route::resource('profillulusan', ProfillulusanController::class);
Route::resource('detailprofillulusan', 'App\Http\Controllers\API\DetailprofillulusanController');
Route::resource('dashboard', 'App\Http\Controllers\API\DashboardController');
Route::resource('bahankajian', 'App\Http\Controllers\API\BahankajianController');
Route::resource('cplprodi', 'App\Http\Controllers\API\CplprodiController');
Route::resource('kesepadananku', 'App\Http\Controllers\API\KesepadanankuController');
Route::resource('kajian', 'App\Http\Controllers\API\KajianController');
