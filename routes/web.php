<?php

use App\Http\Controllers\TestController;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::get('/debug', function () {
    Log::debug('onDebug');
    echo "Debugging";
});

Route::get('/test' , [TestController::class , 'test_ipaymu']);

require __DIR__.'/auth.php';
