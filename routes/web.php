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
    return redirect('animals');
});

Route::prefix('animals')->group(function () {
    Route::get('/', [AnimalController::class, 'showAll'])->name('animals');
    Route::get('/{id}', [AnimalController::class, 'showAnimalData'])
        ->where('id', '[0-9]+')->name('animalData');
});

Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'showAll'])->name('employees');
    Route::get('/{id}', [EmployeeController::class, 'showEmployeeData'])
        ->where('id', '[0-9]+')->name('employeeData');
});


Route::prefix('feeds')->group(function () {
    Route::get('/', [FeedController::class, 'showAll'])->name('feeds');
    Route::get('/{id}', [FeedController::class, 'showFeedData'])
        ->where('id', '[0-9]+')->name('feedData');
});




