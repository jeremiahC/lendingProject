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
    return view('dashboard/index');
});

//Route for customers page
Route::get('/customerPage', 'CustomersController@index');

Route::get('/customerPage/customer{id}', 'CustomersController@show');

Route::get('/customerPage/create', 'CustomersController@create');

Route::get('/customerPage/customer{id}/edit', 'CustomersController@edit');

Route::post('/customerPage/store', 'CustomersController@store');


//Route for loan pages
Route::get('/customerPage/customer{id}/addLoan', 'LoanController@index');

Route::post('/addLoan/store', 'LoanController@store');

Route::get('/customerPage/customer{id}/approveAddLoan', function () {
    return view('loanPages/approveAddLoan');
});

Route::get('/payLoan', 'LoanController@payloan');


Route::get('/addFile', 'UploadController@index');
Route::post('/store', 'UploadController@store');



Route::get('/login', function () {
    return view('userPages/login');
});
