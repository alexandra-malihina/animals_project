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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Animals
Route::get('/animal_kinds', [App\Http\Controllers\AnimalController::class, 'getAnimals'])->name('animal_kinds');
Route::post('/animals', [App\Http\Controllers\AnimalController::class, 'addAnimal'])->name('add_animal');
Route::post('/animals/age', [App\Http\Controllers\AnimalController::class, 'ageAnimal'])->name('age_animal');
