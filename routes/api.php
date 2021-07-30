<?php

use App\Http\Controllers\API\Client\Auth\ClientAuthController;
use App\Http\Controllers\API\Client\ResturantController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/client')->group(function () {
    Route::post('register', [ClientAuthController::class, 'register'])->name('client.register');
    Route::post('login', [ClientAuthController::class, 'login'])->name('client.login');
    // Route::apiResource('countries', CountryController::class);
});

Route::prefix('/client')->middleware(['auth:sanctum', 'type.client'])->group(function () {
    Route::put('profile', [ClientAuthController::class, 'updateProfile'])->name('client.profile.update');
    Route::post('logout', [ClientAuthController::class, 'logout'])->name('client.logout');
    Route::apiResource('resturants', ResturantController::class);
});


