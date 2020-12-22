<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use Carbon\Carbon;

use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Models\Band;
use App\Models\Sale;
use App\Models\User;



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


/* Reset Password routes */
Route::get('forget-password', 'ForgotPasswordController@getEmail')->name('forget-password');
Route::post('forget-password', 'ForgotPasswordController@postEmail')->name('forget-password');

Route::get('reset-password/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');
/*** END RESET ROUTES ***/


/* Frontend routes */
Route::get('bands', 'BandController@getBands')->middleware('auth');
Route::get('band-details/{bandId}', 'BandController@getBandDetails')->middleware('auth');
Route::get('sales', 'SaleController@getSales')->middleware('auth');
/*** END FRONTEND ROUTES ***/


/* Backend routes */
Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('/', function () {
        $nb_band = (new Band)->allBand()->count();
        $nb_user = (new User)->allUsers()->count();
        $sales_figures = (new Sale)->allSale()->sum('total_price');
        
        return view('admin.index', compact('nb_band', 'nb_user', 'sales_figures'));
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
/*** END BACKEND ROUTES ***/
