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

//Page for customers
Route::get('/customerPage', function () {
    return view('customerPage/index');
});

//Page for create customer
Route::get('/customerPage/create', function () {
    return view('customerPage/create');
});

Route::get('/customerPage/edit', function () {
    return view('customerPage/edit');
});

Route::get('/customerPage/customer', function () {
    return view('customerPage/customer');
});

Route::get('/addLoan', function () {
    return view('loanPages/addLoan');
});

Route::get('/approveAddLoan', function () {
    return view('loanPages/approveAddLoan');
});

Route::get('/payLoan', function () {
    return view('loanPages/payLoan');
});

Route::get('/addFile', function () {
    return view('fileManager/addFile');
});

Route::get('/login', function () {
    return view('userPages/login');
});



