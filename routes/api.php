<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProjectController;

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


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::apiResource('project', ProjectController::class)->middleware('auth:api');
Route::get('project_list', [ProjectController::class,'index'])->middleware('auth:api');
Route::get('view_project', [ProjectController::class,'show'])->middleware('auth:api');
Route::put('project', [ProjectController::class,'update'])->middleware('auth:api');
Route::delete('project', [ProjectController::class,'destroy'])->middleware('auth:api');