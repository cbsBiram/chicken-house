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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
   Route::resource('band', 'BandController'); 
   Route::resource('extra', 'ExtraChargeController'); 
   Route::resource('food', 'AlimentController'); 
   Route::resource('sale', 'SaleController'); 
   Route::resource('user', 'UserController');
   Route::get('food/create/{bandId}', 'AlimentController@createFood'); 
   Route::post('food/store/{bandId}', 'AlimentController@storeFood'); 
   Route::get('extra/create/{bandId}', 'ExtraChargeController@createExtra'); 
   Route::post('extra/store/{bandId}', 'ExtraChargeController@storeExtra'); 
});
