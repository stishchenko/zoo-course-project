<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeedController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnimalController;

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

Route::get('/animals', [AnimalController::class, 'showAll'])->name('animals');
Route::get('/employees', [EmployeeController::class, 'showAll'])->name('employees');
Route::get('/feeds', [FeedController::class, 'showAll'])->name('feeds');




