<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController as UserAPI;

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

Route::post('/register', [UserAPI::class, 'register']);
Route::post('/login', [UserAPI::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('/logout', [UserAPI::class, 'logout']);
});