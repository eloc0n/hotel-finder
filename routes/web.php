<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccommodationsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('', [AccommodationsController::class, 'index']);
Route::get('/search', [AccommodationsController::class, 'search']);
Route::get('/hotel/{id}', [AccommodationsController::class, 'hotel']);
Route::post('/hotel/{id}', [AccommodationsController::class, 'store']);