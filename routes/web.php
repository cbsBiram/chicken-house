<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;

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

Route::get('/test', function() {
    $today = Carbon::today();
    $start = Carbon::parse('2020-12-05 20:47:26');
    $days = $today->diffInDays($start);

    dd($days); 
});


Route::get('bands', 'BandController@getBands')->middleware('auth');
Route::get('band-details/{bandId}', 'BandController@getBandDetails')->middleware('auth');
Route::get('sales', 'SaleController@getSales')->middleware('auth');

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
