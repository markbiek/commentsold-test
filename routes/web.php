<?php

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

Route::middleware(['auth'])->group(function () {
	Route::get('/', function () {
		return redirect()->route('dashboard');
	});

	Route::get('/dashboard', [
		\App\Http\Controllers\DashboardController::class,
		'show',
	])->name('dashboard');

	Route::post('/products/add', [
		\App\Http\Controllers\DashboardController::class,
		'add_product',
	])->name('add_product');

	Route::get('/inventory', [
		\App\Http\Controllers\InventoryController::class,
		'inventory',
	])->name('inventory');
	Route::get('/inventory/{product}', [
		\App\Http\Controllers\InventoryController::class,
		'product_inventory',
	])->name('product_inventory');
});

require __DIR__ . '/auth.php';
