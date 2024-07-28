<?php

use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\Api\v1\InvocesController;
use App\Http\Controllers\Api\v1\AppointmentController;
use App\Http\Controllers\Api\v1\CartController;
use App\Http\Controllers\Api\v1\CommentController;
use App\Http\Controllers\Api\v1\DoctorController;
use App\Http\Controllers\Api\v1\MedicineController;
use App\Http\Controllers\Api\v1\MessageController;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1', 'namespace'=>'App\Http\Controllers\Api\v1'],function(){
    Route::apiResource('doctors', DoctorController::class);
    Route::apiResource('appointments', AppointmentController::class);
    Route::apiResource('messages', MessageController::class);
    Route::apiResource('medicines', MedicineController::class);
    Route::apiResource('comments', CommentController::class);
    Route::apiResource('carts', CartController::class);
    Route::get('lastMessages', [MessageController::class, 'last_messages']);

    
});


