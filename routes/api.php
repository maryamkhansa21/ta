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

//Route::resource('profillulusan', ProfillulusanController::class);
Route::resource('profillulusan', 'App\Http\Controllers\API\ProfillulusanController');
Route::resource('detailprofillulusan', 'App\Http\Controllers\API\DetailprofillulusanController');
Route::resource('dashboard', 'App\Http\Controllers\API\DashboardController');
Route::resource('bahankajian', 'App\Http\Controllers\API\BahankajianController');
Route::resource('cplprodi', 'App\Http\Controllers\API\CplprodiController');
Route::resource('kesepadananku', 'App\Http\Controllers\API\KesepadanankuController');
Route::resource('kajian', 'App\Http\Controllers\API\KajianController');
Route::resource('matkul', 'App\Http\Controllers\API\MatkulController');
Route::resource('detailmatkul', 'App\Http\Controllers\API\DetailmatkulController');
Route::resource('pembentukanmatkul', 'App\Http\Controllers\API\PembentukanmatkulController');
Route::resource('distribusimatkul', 'App\Http\Controllers\API\DistribusimatkulController');
// Route::get('/cetakdata', 'App\Http\Controllers\API\DistribusimatkulController@cetakdata');
Route::get('/bkajian', 'App\Http\Controllers\API\PembentukanmatkulController@bkajian');
Route::get('/totaltk', 'App\Http\Controllers\API\PembentukanmatkulController@totaltk');
Route::get('/alltotaltk', 'App\Http\Controllers\API\PembentukanmatkulController@alltotaltk');
Route::get('/besarsks', 'App\Http\Controllers\API\PembentukanmatkulController@besarsks');
Route::put('/test/array', 'App\Http\Controllers\API\KajianController@testmultipleupdate');
Route::put('/test/array', 'App\Http\Controllers\API\KesepadanankuController@multipleupdate');
Route::get('/matkul/all', 'App\Http\Controllers\API\MatkulController@indexSemuaMatkul');

//Route::put('/matkul/all', 'App\Http\Controllers\API\MatkulController@updateSemuaMatkul');
//Route::delete('/matkul/all', 'App\Http\Controllers\API\MatkulController@destroySemuaMatkul');
