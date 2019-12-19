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
    //throw_if(true,new App\Exceptions\users());
    
    return view('welcome');
});

//Users Routes
Route::get('/users','usersController@index');
Route::get('/users/create','usersController@create');
Route::POST('/users/store','usersController@store');
Route::get('/users/edit/{id}','usersController@edit');
Route::POST('/users/update/{id}','usersController@update');
Route::get('/users/{id}/activation','usersController@activation');
Route::get('/users/{id}/destroy','usersController@destroy');


//customers Routes
Route::get('/customers','customerController@index');
Route::get('/customers/{id}/activation','customerController@activation');
Route::get('/customers/{id}/destroy','customerController@destroy');

//Rooms Routes
Route::get('/rooms','roomController@index');
Route::get('/rooms/create','roomController@create');
Route::POST('/rooms/store','roomController@store');
Route::get('/rooms/edit/{id}','roomController@edit');
Route::POST('/rooms/update/{id}','roomController@update');
Route::get('/rooms/{id}/destroy','roomController@destroy');


//bookings Routes
Route::get('/bookings','bookingController@index');
Route::get('/bookings/create','bookingController@create');
Route::POST('/bookings/store','bookingController@store');
Route::get('/bookings/edit/{id}','bookingController@edit');
Route::POST('/bookings/update/{id}','bookingController@update');
Route::get('/bookings/{id}/activation','bookingController@activation'); 
Route::get('/accept_bookings/{id}/activation','bookingController@activationAcceptance');
Route::get('/bookings/{id}/destroy','bookingController@destroy');
Route::get('/booking_acceptance/{id}/destroyAcceptance','bookingController@destroyAcceptance');

Route::get('/bookings/{id}/accept','bookingController@acceptance');
Route::get('/accept_bookings','bookingController@accept_bookings');


//countries routes
Route::get('/countries','countrycontroller@index');
Route::get('/countries/create','countrycontroller@create');
Route::POST('/countries/store','countrycontroller@store');
Route::get('/countries/edit/{id}','countrycontroller@edit');
Route::POST('/countries/update/{id}','countrycontroller@update');
Route::get('/countries/{id}/destroy','countrycontroller@destroy');


//Introduction Routes
Route::get('/introduction','introductioncontroller@index');
Route::get('/introduction/create','introductioncontroller@create');
Route::POST('/introduction/store','introductionController@store');
Route::POST('/introduction/edit/{id}','introductionController@edit');
Route::POST('/introduction/update/{id}','introductionController@update');
Route::POST('/introduction/{id}/destroy','introductionController@destroy');

//Tours Routes
Route::get('/tours','tourscontroller@index');
Route::get('/tours/create','tourscontroller@create');
Route::post('/tours/store','tourscontroller@store');
Route::get('/tours/edit/{id}','tourscontroller@edit');
Route::POST('/tours/update/{id}','tourscontroller@update');
Route::get('/tours/{id}/destroy','tourscontroller@destroy');

//drinks routes
Route::get('/drinks','drinkscontroller@index');
Route::get('/drinks/create','drinkscontroller@create');
Route::POST('/drinks/store','drinkscontroller@store');
Route::get('/drinks/{id}/destroy','drinkscontroller@destroy');

//drinkPhotos routes
Route::get('/drinkPhotos','drinkPhotoscontroller@index');
Route::get('/drinkPhotos/create','drinkPhotoscontroller@create');
Route::POST('/drinkPhotos/store','drinkPhotoscontroller@store');
Route::get('/drinkPhotos/{id}/destroy','drinkPhotoscontroller@destroy');

Route::get('/foods','foodscontroller@index');
Route::get('/foods/create','foodscontroller@create');
Route::POST('/foods/store','foodscontroller@store');
Route::get('/foods/{id}/destroy','foodscontroller@destroy');

//food photos routes

Route::get('/foodphotos','foodsPhotocontroller@index');
Route::get('/foodphotos','foodsPhotocontroller@create');
Route::POST('/foodPhotos/store','foodsPhotocontroller@store');
Route::get('/foodphotos/{id}/destroy','foodsPhotocontroller@destroy');

//cities route
Route::get('/cities','citycontroller@index');
Route::get('/cities/create','citycontroller@create');
Route::POST('/cities/store','citycontroller@store');
Route::get('/cities/{id}/destroy','citycontroller@destroy');


//roomPhotos routes
Route::get('/roomPhotos','roomsphotocontroller@index');
Route::get('/roomkPhotos/create','roomsphotocontroller@create');
Route::POST('/roomPhotos/store','roomsphotocontroller@store');
Route::get('/roomPhotos/{id}/destroy','roomsphotocontroller@destroy');

//tourPhotos routes
Route::get('/tourPhotos','tourPhotoscontroller@index');
Route::get('/tourPhotos/create','tourPhotoscontroller@create');
Route::POST('/tourPhotos/store','tourPhotoscontroller@store');
Route::get('/tourPhotos/{id}/destroy','tourPhotoscontroller@destroy');




Route::get('/product','Product\ProductController@index');
Route::get('/product/create','Product\ProductController@create');
Route::POST('/product/store','Product\ProductController@store');
Route::get('/product/edit/{id}','Product\ProductController@edit');
Route::POST('/product/update/{id}','Product\ProductController@update');
Route::get('/product/{id}/destroy','Product\ProductController@destroy');









