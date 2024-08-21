<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::controller(App\Http\Controllers\CarController::class)->as('cars.')->middleware('verified')->group(function() {
    Route::prefix('cars')->group(function(){
        Route::prefix('{id}')->group(function(){
            Route::put('',  'update')->name('update');
            Route::delete('',  'forceDelete')->name('Delete');
            Route::patch('',  'restore')->name('restore');
            Route::get('edit',  'edit')->name('edit');
            Route::get('show',  'show')->name('show');
            Route::get('delete',  'destroy')->name('destroy');
        });
        Route::get('create',  'create')->name('create');
        Route::post('',  'store')->name('store');
        Route::get('',  'index')->name('index');
        Route::get('trashed',  'showDeleted')->name('showDeleted');
    });
    
});

