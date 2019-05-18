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

// everything inside the 'auth' middleware will only be accessible
// when the user is logged in.
Route::group(['middleware' => ['auth']], function() {
    Route::get('/view', 'ProductController@list');   // displays all phone entries
    Route::get('/view/{id}', 'ProductController@get'); // display one phone entry

    Route::view('/add', 'add');     // shows the add new screen
    Route::post('/add', 'ProductController@store');   // inserts the record into the DB

    Route::get('/edit/{id}', 'ProductController@edit'); // edit one phone entry
    Route::post('/edit/{id}', 'ProductController@update'); // save edited record

    Route::get('/delete/{id}', 'ProductController@delete'); // confirm removal of record
    Route::post('/delete/{id}', 'ProductController@remove'); // actual removal of record

    Route::get('/shop', 'ProductController@shoplist');   // displays all phone entries
    Route::get('/shop/{id}', 'ProductController@shopget'); // display one phone entry

    Route::get('/logout', 'HomeController@logout');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');

/*Route::get('/', function() {
    return view('paywithpaypal');
});
*/

Route::get('/paypalpage', 'PaymentController@index');
Route::post('paypal', 'PaymentController@payWithpaypal');
Route::get('status', 'PaymentController@getPaymentStatus');