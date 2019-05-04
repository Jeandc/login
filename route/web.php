<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
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
    return view('auth.login');
});
//Rutas del login
Route::post('login','auth\loginController@login')->name('login');
Route::post('logout','auth\loginController@logout')->name('logout');

// Rutas de Reseteo de contraseña...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('reset/{usuarioid}', 'Auth\ResetPasswordController@password')->name('password.reset');
Route::post('reset','Auth\ResetPasswordController@update')->name('password.update');


?>