<?php

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
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login/submit', 'UserController@submitLogin')->name('login.submit');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/register/{role}', function ($role) {
    switch ($role) {
        case 'donatur':
            return view('register_donatur');
        break;
        case 'sponsor':
            return view('register_sponsor');
        break;
        default:
            return view('register_relawan');
        break;
    }
})->name('register_by_role');

Route::post('/register/submit', 'UserController@submitRegister')->name('register.submit');
