<?php

use App\Http\Controllers\API\v1\Admin\auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Resources\v1\Admin\UserRessource as AdminUserRessource;

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


Route::prefix('v1')->group(function () {

    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
    ], function () {
        Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
        Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
            return new AdminUserRessource($request->user());
        });
    });

    Route::group([
        'prefix' => 'client',
        'as' => 'client.',
    ],function () {
        Route::post('/register', []);
        Route::post('/login', []);
        Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
            return  $request->user();
        });
    });
});
