<?php

use App\Http\Controllers\AIResponseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DeviceController;
use App\Models\AIResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/esp', function(){
    return "test";
});

Route::post('/esp', function(Request $request){
    Log::info($request->all());
    return $request->all();
});

Route::get('/data', [DataController::class, 'index']);
Route::post('/data', [DataController::class, 'store']);

Route::post('/device', [DeviceController::class, 'store']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/aidevices', [AIResponseController::class, 'index']);
Route::post('/airesponse', [AIResponseController::class, 'store']);

Route::post('/forgotten-password', [AuthController::class, 'reset']);
Route::get('/device/{id}', [DeviceController::class, 'show']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/check-auth', [AuthController::class, 'check']);
    Route::get('/devices', [DeviceController::class, 'index']);
    Route::get('/airesponse/{id}', [AIResponseController::class, 'show']);
});