<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/w', function () {
    return "hi";
});

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
Route::prefix('accounts')->group(function () {
    Route::get('', function () {
        return "Accounts index";
    });
    Route::get('admin', function () {
        return "Accounts admin";
    });
    Route::get('user', function () {
        return "Accounts user";
    });

});



Route::prefix('cars')->group(function () {
    Route::get('', function () {
        return "cars index";
    });
    Route::prefix('usa')->group(function () {
        Route::get('ford', function () {
            return "cars usa ford";
        });
        Route::get('tesla', function () {
            return "cars usa tesla";
        });
    }); // Closing the 'usa' prefix group

    Route::prefix('ger')->group(function () {
        Route::get('mercedes', function () {
            return "cars ger mercedes";
        });
        Route::get('audi', function () {
            return "cars ger audi";
        });
        Route::get('volkeswagen', function () {
            return "company ger volkswagen";
        });
    });
});