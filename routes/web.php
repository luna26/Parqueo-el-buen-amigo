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
    return view('login');
}); 


Route::get('dashboard',array('as'=>'dashboard',function()
    {
        return view('dashboard');
     }
));


//SERVICIOS

//*//LOGIN
Route::post('/login', 'LoginController@login');

//COBROS
Route::post('/billingView', 'DashboardController@getBilling');
Route::post('/addBill', 'DashboardController@createBilling');
Route::post('/bill', 'DashboardController@bill');
Route::post('/getBill', 'DashboardController@getBill');

//USUARIOS usersView
Route::post('/usersView', 'DashboardController@usersView');
Route::post('/deleteUser', 'DashboardController@deleteUser');
Route::post('/createUser', 'DashboardController@createUser');


//PRECIOS
Route::post('/getPrices', 'DashboardController@getPrices');
Route::post('/updatePrice', 'DashboardController@updatePrice');

//INFO
Route::post('/viewInfo', 'DashboardController@viewInfo');
Route::post('/updateInfo', 'DashboardController@updateInfo');

//REPORTEST
Route::post('/viewReport', 'DashboardController@viewReport');
Route::post('/dateReport', 'DashboardController@dateReport');
Route::post('/billNum', 'DashboardController@billNum');
Route::post('/billUser', 'DashboardController@billUser');
Route::post('/billcustomer', 'DashboardController@billcustomer');