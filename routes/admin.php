<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
//Route::group(['middleware'=> 'verified','as'=> 'cars.','controller'=> 'CarController::class'],function() {

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

    // Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
    // Route::post('cars', [CarController::class, 'store'])->name('cars.store');
    // Route::get('cars', [CarController::class, 'index'])->name('car.index');
    // Route::get('cars/{id}/edit', [CarController::class, 'edit'])->name('car.edit');
    // Route::get('cars/{id}/show', [CarController::class, 'show'])->name('car.show')->where([ 'id' => '[0-9]+']);
    // Route::get('cars/{id}/delete', [CarController::class, 'destroy'])->name('car.destroy');
    // Route::put('cars/{id}', [CarController::class, 'update'])->name('car.update');
    // Route::get('cars/trashed', [CarController::class, 'showDeleted'])->name('car.showDeleted');
    // Route::delete('cars/{id}', [CarController::class, 'forceDelete'])->name('car.Delete');
    // Route::patch('cars/{id}', [CarController::class, 'restore'])->name('car.restore');
        
    });



    

