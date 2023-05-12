<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DubaiController;
use App\Http\Controllers\DubaiCashController;
use App\Http\Controllers\IstanbulCashController;
use App\Http\Controllers\TurkeyController;
use App\Http\Controllers\VanuatuController;
use App\Http\Controllers\VanuatuCashController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/receivables/dubai/{key?}', [DubaiCashController::class, 'indexApi']);
Route::get('/receivables/istanbul/{key?}', [IstanbulCashController::class, 'indexApi']);
Route::get('/receivables/vanuatu/{key?}', [VanuatuCashController::class, 'indexApi']);

Route::get('/dubai/{key?}', [DubaiController::class, 'indexApi']);
Route::delete('/dubai/{id}', [DubaiController::class, 'destroy']);
Route::get('/istanbul/{key?}', [TurkeyController::class, 'indexApi']);
Route::delete('/istanbul/{id?}', [TurkeyController::class, 'destroy']);
Route::get('/vanuatu/{key?}', [VanuatuController::class, 'indexApi']);
Route::delete('/vanuatu/{id?}', [VanuatuController::class, 'destroy']);

Route::delete('/receivables/dubai/{id}', [DubaiCashController::class, 'destroy']);
Route::delete('/receivables/istanbul/{id}', [IstanbulCashController::class, 'destroy']);
Route::delete('/receivables/vanuatu/{id}', [VanuatuCashController::class, 'destroy']);