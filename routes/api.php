<?php

use App\Http\Controllers\AnimeFanArtController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\User\UserController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/webhook' , [TestController::class , 'webhook']);
Route::get('/user/{email}' , [UserController::class , 'findUser']);

//Anime section
Route::get('/animefan-art' , [AnimeFanArtController::class , 'throwAll']);
Route::post('/animefan-art' , [AnimeFanArtController::class , 'store']);
Route::put('/animefan-art/{anime}' , [AnimeFanArtController::class , 'update']);
Route::delete('/animefan-art/{anime}' , [AnimeFanArtController::class , 'delete']);
Route::get('/animefan-art-specifiec' , [AnimeFanArtController::class , 'searchAnimeByName']);
Route::get('/animefan-art-category' , [AnimeFanArtController::class , 'throwAllWithCategories']);

Route::post('/tester' , [AnimeFanArtController::class , 'testOne']);
Route::get('/tester' , [AnimeFanArtController::class , 'testGet']);

