<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
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



Route::post('/auth/register', [AuthController::class, 'register']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', function(Request $request) {
        return auth()->user();
    });

    Route::post('/auth/admin', [AdminController::class, 'RegisterUser']);


    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::get('/users', [UserController::class, 'getUsers']);
    Route::get('/user/{id}', [UserController::class, 'getUser']);
    Route::post('/user', [UserController::class, 'storeUser']);
    Route::put('user/{id}', [UserController::class, 'updateUser']);

    Route::get('/products', [ProductController::class, 'getProducts']);
    Route::get('/product/{id}', [ProductController::class, 'getProduct']);
    Route::post('/product', [ProductController::class, 'storeProduct']);
    Route::put('product/{id}', [ProductController::class, 'updateProduct']);

    Route::get('/sales', [SaleController::class, 'getSales']);
    Route::post('/sale', [SaleController::class, 'storeSale']);


    });
       
