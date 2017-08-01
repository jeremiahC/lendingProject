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
Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/pendingLoans', 'HomeController@listOfLoans');

//Route for customers page
Route::get('/customerPage', 'CustomersController@index');
Route::get('/customerPage/customer{id}', 'CustomersController@show');

Route::get('/customerPage/create', 'CustomersController@create');
Route::post('/customerPage/store', 'CustomersController@store');
Route::get('/customerPage/customer{id}/edit', 'CustomersController@edit');
Route::post('/customerPage/update/{id}', 'CustomersController@update');


//Route for loan pages

Route::get('/interest/{id}', 'LoanController@getIntrst');
Route::post('/interest/store', 'LoanController@storeIntrst');
Route::get('/loanPage', 'LoanController@index');
Route::get('/loanPage/show', 'LoanController@showAllLoan');
Route::get('/loanPage/showAppr', 'LoanController@showAllLoanAppr');
Route::get('/customerPage/customer{id}/addLoan', 'LoanController@create');
Route::get('/loan/{id}/amountapprove', 'LoanController@createAmtApp');
Route::get('/loan/{id}/edit', 'LoanController@edit');
Route::post('/loan/{id}/update', 'LoanController@update');
Route::post('/addLoan/store/{id}', 'LoanController@store');
Route::get('/customer{id}/payLoan/{ledgId}', 'LoanController@payLoanPage');
Route::post('/pay', 'LoanController@payLoan');
Route::get('/newTransaction/{id}', 'LoanController@newTransac');
Route::post('/storeTransaction', 'LoanController@storeTransac');

Route::post('/addLoan/storeAmtApp', 'LoanController@storeAmtApp');

Route::post('/amount/approve', 'LoanController@approveLoan');
Route::post('/amount/disapprove', 'LoanController@disapproveLoan');
Route::get('/customerPage/customer{id}/approveAddLoan', function () {
    return view('loanPages/approveAddLoan');
});

Route::get('/show/loan/{id}', 'LoanController@show');

//file manager
Route::get('/addFile', 'UploadController@index');
Route::post('/store', 'UploadController@store');



Route::get('/customerPage/customer{id}/generateIntrst', 'LoanController@generateIntrst');

Route::get('/userSet', function (){
    return view('settings.userProf');
});

Route::get('/passSet', function (){
    return view('settings.passSet');
});

Route::get('/rolesPrev', 'RolePermissionController@index');
Route::post('/storeRole', 'RolePermissionController@createRolePerm');
Route::post('/deletRole/{id}', 'RolePermissionController@destroyRoleUser');
Route::get('/userList', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
Route::post('/addRole', 'RolePermissionController@addRole');

Route::get('/scan/{dir}', 'FileManagerController@scan');
Route::post('/upload', 'FileManagerController@upload');

//Notification
Route::get('/markAsRead', function (){
    auth()->user()->unreadNotifications->markAsRead();
});

/*Investments Routes*/
//get
Route::get('/investments', 'InvestmentController@index');
Route::get('/investments/add/customer{id}', 'InvestmentController@create');
Route::get('/investments/edit/{id}', 'InvestmentController@edit');
Route::get('/investments/show/{id}', 'InvestmentController@show');
Route::get('/investments/approve/{id}', 'InvestmentController@createAmtApp');
Route::get('/investments/interest/customer{id}', 'InvestmentController@getInterest');

//post
Route::post('/addInvestment', 'InvestmentController@store');
Route::post('/editInvestment', 'InvestmentController@update');
Route::post('/deleteInvestment', 'InvestmentController@destory');
Route::post('/addInvApprove', 'InvestmentController@storeInvAmt');
Route::post('/invapprove', 'InvestmentController@approve');
Route::post('/invdisapprove', 'InvestmentController@disapprove');
Route::post('/invinterest', 'InvestmentController@postInterest');
/*admin routes*/

//Route::get('/database/amountApprove','AdminController@index')->name('LoanAmount');
//Route::get('/database/customers','AdminController@index')->name('Customer');
//Route::get('/database/ledgers','AdminController@index')->name('Ledger');
//Route::get('/database/loans','AdminController@index')->name('Loan');
////Route::get('/database/notifications','AdminController@')->name('');
//Route::get('/database/passwordreset','AdminController@index')->name();
//Route::get('/database/payments','AdminController@index')->name('Payment');
//Route::get('/database/permissionroles','AdminController@index')->name('Permission');
//Route::get('/database/permissions','AdminController@index')->name('');
//Route::get('/database/roles','AdminController@index')->name();
//Route::get('/database/roleuser','AdminController@index')->name();
//Route::get('/database/users','AdminController@index')->name();
//Route::get('/database/','AdminController@index')->name();