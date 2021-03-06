<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => config('api.version')], function() {

    Route::post('auth/login', [AuthController::class, 'login']);
    Route::post('auth/logout/{accessToken}', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('auth/user/{accessToken}', [AuthController::class, 'getUserByToken'])->middleware('auth:sanctum');

    Route::get('/', function () {
        return response()->json([
            'name' => env('API_NAME'),
            'version' => env('API_VERSION')
        ]);
    });//->middleware('auth:sanctum');
});
