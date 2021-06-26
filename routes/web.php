<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', function () {});
Route::get('/test', function () {});


Route::group(['prefix' => 'category'], function() {
    Route::get('', [CategoryController::class, "index"]);
    Route::post('/store', [CategoryController::class, "store"])->name('categories.store');
    Route::get('/create', [CategoryController::class, "create"])->name('categories.create');
});

