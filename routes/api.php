<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomAuthController;
use App\Http\Controllers\API\ExpensesController;
use App\Http\Controllers\API\IncomeController;


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



Route::post('register', [CustomAuthController::class, 'register']);
Route::post('login', [CustomAuthController::class, 'login']);

     
Route::middleware('auth:api')->group( function () {
Route::resource('expenses', ExpensesController::class);
});

Route::middleware('auth:api')->group( function () {
Route::resource('income', IncomeController::class);
});
