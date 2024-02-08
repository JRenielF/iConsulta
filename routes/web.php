<?php

use App\Http\Controllers\InformationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/information', [InformationController::class, 'index'])->name('information.index');
Route::get('/information/create', [InformationController::class, 'create'])->name('information.create');
Route::post('/information', [InformationController::class, 'store'])->name('information.store');
Route::get('/information/{information}/edit', [InformationController::class, 'edit'])->name('information.edit');
Route::put('/information/{information}', [InformationController::class, 'update'])->name('information.update');
Route::delete('/information/{information}', [InformationController::class, 'destroy'])->name('information.destroy');
