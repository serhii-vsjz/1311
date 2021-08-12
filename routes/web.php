<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;

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
    return redirect()->route('create');
});
Route::get('/address/create', [AddressController::class, 'create'])->name('create');
Route::post('/address/', [AddressController::class, 'store'])->name('address.store');
Route::get('/areas/{id}', [AddressController::class, 'areas']);
Route::get('/areas/destroy/{id}', [AddressController::class, 'destroy'])->name('address.destroy');
