<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DubaiController;
use App\Http\Controllers\TurkeyController;
use App\Http\Controllers\VanuatuController;

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
// Route::get('/dubai/{id}', [DubaiController::class, 'indexApi']);
Route::get('/dubai', [DubaiController::class, 'indexApi']);
Route::get('/turkey', [TurkeyController::class, 'indexApi']);
Route::get('/vanuatu', [VanuatuController::class, 'indexApi']);

