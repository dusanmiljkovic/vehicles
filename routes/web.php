<?php

use App\Http\Controllers\PageController;
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
    return redirect(route('vehicles.index'));
});

Route::post('/brandModels', [PageController::class, 'brandModels'])->name('brandModels');

Route::get('/vehicles', [PageController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/create', [PageController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles', [PageController::class, 'store'])->name('vehicles.store');
Route::get('/vehicles/{vehicle}/edit', [PageController::class, 'edit'])->name('vehicles.edit');
Route::patch('/vehicles/{vehicle}', [PageController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{vehicle}', [PageController::class, 'delete'])->name('vehicles.delete');

Route::get('/vehicles-as-csw', [PageController::class, 'download'])->name('vehicles.download');
