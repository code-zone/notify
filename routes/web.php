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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::resource('students', 'StudentsController');
Route::get('students/block-account/{student}', 'StudentsController@blockAccount')->name('block-account');
Route::get('students/unblock-account/{student}', 'StudentsController@unblockAccount')->name('unblock-account');

Route::get('meals/{meal}/availability', 'MealsController@show')->name('meals.availability')->middleware('can:update-meals');
Route::get('meals', 'MealsController@index')->name('meals.index');
Route::get('meals/{meal}/edit', 'MealsController@edit')->name('meals.edit')->middleware('can:update-meals');
Route::post('meals', 'MealsController@store')->name('meals.store')->middleware('can:create-meals');
Route::patch('meals/{meal}', 'MealsController@update')->name('meals.update')->middleware('can:update-meals');
Route::post('meals/{meal}/availability', 'MealsController@availability')->name('meals.availability.store')->middleware('can:create-meals');
Route::get('meals/create', 'MealsController@create')->name('meals.create')->middleware('can:create-meals');

Route::get('orders/', 'OrdersController@index')->name('orders.index')->middleware('can:view-orders');
Route::get('orders/{order}', 'OrdersController@show')->name('orders.show')->middleware('can:view-orders');
Route::get('orders/{order}/approve-sale', 'OrdersController@approve')->name('orders.approve')->middleware('can:dispense-orders');
Route::get('sales/report', 'OrdersController@sales')->name('sales')->middleware('can:view-reports');


Route::get('payments/create/{student}', 'PaymentsController@create')->name('payments.create');
Route::post('payments/create/{student}', 'PaymentsController@store')->name('payments.save');
Route::get('cart/add/{meal}', 'CartController@add')->name('cart-item.add');
Route::get('users', 'UserController@index')->name('users.index')->middleware('can:manage-users');
//Route::resource('users', 'UserController');
Route::get('users/block/{user}', 'UserController@block')->name('users.block')->middleware('can:manage-users');
Route::get('users/unblock/{user}', 'UserController@unblock')->name('users.unblock')->middleware('can:manage-users');
Route::get('cart', 'CartController@index')->name('cart.index')->middleware('can:order-meals');
Route::get('cart/remove/{meal}', 'CartController@remove')->name('cart.pop-item')->middleware('can:order-meals');
Route::post('cart/place-order', 'CartController@placeOrder')->name('cart.place-order');
Route::get('payments/list', 'PaymentsController@index')->name('payments.index');
Route::get('users/create/new', 'UserController@create')->name('users.create')->middleware('can:manage-users');
Route::post('users', 'UserController@store')->name('users.store')->middleware('can:manage-users');
Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('can:manage-users');
Route::patch('users/{user}', 'UserController@update')->name('users.update')->middleware('can:manage-users');
