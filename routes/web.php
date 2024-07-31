<?php

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;




Route::get('/', function () {
    return view('welcome');
});
// Route::get('/w', function () {
//     return "hi";
// });

// Route::get('/cars/{id}', function ($id) {
//     return "the number is ".$id;
// });
// Route::get('/cars/{id?}', function ($id) {
//     return "the number is ".$id;
// });
// Route::get('/cars/{id?}', function ($id=0) {
//     return "the number is ".$id;
// })->where(['id' => '[0-9]+']);

// Route::get('/cars/{id?}', function ($id = 0) {
//     return "the number is " . $id;
// })->whereNumber('id');

// Route::get('user/{name}/{age}', function($name, $age){
//     return "Username is " . $name . " and age is " . $age;
// })->whereAlpha('name')->whereNumber('age');
//nesting

// Route::get('user/{name}/{age}', function($name, $age){
//     return "Username is " . $name . " and age is " . $age;
// })->where([
//     'name' => '[a-zA-Z]+',
//     'age' => '[0-9]+']);

// Route::get('user/{name}/{age?}', function ($name, $age = 0) {
//     if ($age == 0) {
//         return "Username is " . $name;
//     } else {

//         return "Username is " . $name . " and age is " . $age;
//     }
// })->where([
//     'name' => '[a-zA-Z]+',
//     'age' => '[0-9]+']);

// Route::get('user/{name}/{age?}', function ($name, $age = 0) {
//     if ($age === 0) {
//         return "Username is " . $name;
//     } else {

//         return "Username is " . $name . " and age is " . $age;
//     }
// })->where([
//     'name' => '[a-zA-Z]+',
//     'age' => '[0-9]+']);

// Route::get('user/{name}/{age?}', function ($name, $age = null) {
//     if ($age === null) {
//         return "Username is " . $name;
//     } else {

//         return "Username is " . $name . " and age is " . $age;
//     }
// })->where([
//     'name' => '[a-zA-Z]+',
//     'age' => '[0-9]+']);

// Route::get('/cars/{gender}', function ($gender) {
//         return "the number is ".$gender;
//     })->whereIn('gender' ,['male' , 'female']);
// Route::prefix('company')->group(function(){
//     Route::get('', function () {
//         return "company index";
//     });
//     Route::get('it', function () {
//         return "company it";
//     });
//     Route::get('users', function () {
//         return "company users";
//     });

// });
// Route::prefix('accounts')->group(function () {
//     Route::get('', function () {
//         return "Accounts index";
//     });
//     Route::get('admin', function () {
//         return "Accounts admin";
//     });
//     Route::get('user', function () {
//         return "Accounts user";
//     });

// });



// Route::prefix('cars')->group(function () {
//     Route::get('', function () {
//         return "cars index";
//     });
//     Route::prefix('usa')->group(function () {
//         Route::get('ford', function () {
//             return "cars usa ford";
//         });
//         Route::get('tesla', function () {
//             return "cars usa tesla";
//         });
//     }); // Closing the 'usa' prefix group

//     Route::prefix('ger')->group(function () {
//         Route::get('mercedes', function () {
//             return "cars ger mercedes";
//         });
//         Route::get('audi', function () {
//             return "cars ger audi";
//         });
//         Route::get('volkeswagen', function () {
//             return "company ger volkswagen";
//         });
//     });
// });
// Route::fallback(function (){
// return  Redirect('/');


// });
// Route::get('/cv' ,  [ExampleController::class ,'cv']);
// Route::get('/task3' ,  [ExampleController::class ,'task3']);
// Route::post('/task3go' ,  [ExampleController::class ,'task3go'])->name('task3in');



// Route::get('link' , function(){
// $url = route('w');
// return "<a href='$url' >go to welcome</a>";


// });

// Route::get('welcome', function(){

// return "welcome to laravel";

// })->name('w');

// Route::get('login' , [ExampleController::class ,'login']);
// Route::post('logindone',[ExampleController::class , 'logincheck'] )->name('logindone');

//***********************************************************************************//

Route::get('car/create', [CarController::class, 'create'])->name('cars.create');
Route::post('cars', [CarController::class, 'store'])->name('cars.store');
Route::get('cars', [CarController::class, 'index'])->name('car.index');
Route::get('cars/{id}/edit', [CarController::class, 'edit'])->name('car.edit');
Route::get('cars/{id}/show', [CarController::class, 'show'])->name('car.show')->where([ 'id' => '[0-9]+']);
Route::get('cars/{id}/delete', [CarController::class, 'destroy'])->name('car.destroy');
Route::put('cars/{id}', [CarController::class, 'update'])->name('car.update');
Route::get('cars/trashed', [CarController::class, 'showDeleted'])->name('car.showDeleted');
Route::delete('cars/{id}', [CarController::class, 'forceDelete'])->name('car.Delete');
Route::patch('cars/{id}', [CarController::class, 'restore'])->name('car.restore');


Route::get('class/create', [ClassController::class, 'create'])->name('car.create');
Route::post('classes', [ClassController::class, 'store'])->name('class.store');
Route::get('classes', [ClassController::class, 'index'])->name('class.index');
Route::get('class/{id}/edit', [ClassController::class, 'edit'])->name('class.edit');
Route::get('class/{id}', [ClassController::class, 'show'])->name('class.show')->where([ 'id' => '[0-9]+']);
Route::get('class/{id}/delete', [ClassController::class, 'destroy'])->name('class.destroy');
Route::delete("delete", [ClassController::class,"destroy"])->name('deleteClient');
Route::put('class/{id}', [ClassController::class, 'update'])->name('class.update');
Route::get('class/trashed', [ClassController::class, 'showDeleted'])->name('class.showDeleted');
Route::delete('class/{id}', [ClassController::class, 'forceDelete'])->name('class.Delete');
Route::patch('class/{id}', [ClassController::class, 'restore'])->name('class.restore');