<?php

use App\Http\Controllers\CoffeeController;
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

Route::prefix('coffees')->group(function () {
    Route::get('/', [CoffeeController::class, 'index'])->name('coffees.index');
    Route::get('/create', [CoffeeController::class, 'create'])->name('coffees.create');
    Route::post('/create', [CoffeeController::class, 'store'])->name('coffees.store');
    Route::get('{id}/edit', [CoffeeController::class, 'edit'])->name('coffees.edit');
    Route::post('{id}/edit', [CoffeeController::class, 'update'])->name('coffees.update');
    Route::get('{id}/destroy', [CoffeeController::class, 'destroy'])->name('coffees.destroy');
    Route::post('search', [CoffeeController::class, 'searchPrice']);
});
