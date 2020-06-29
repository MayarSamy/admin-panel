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

// Route::get('/', function(){
//     return 'INDEX';
// });
Route::get('/', function(){
    return redirect('login');
});
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth'
], function () {
    Route::get('/', 'DashboardController')->name('dashboard');

    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('customers', 'CustomerController');
    Route::resource('payments', 'PaymentController');
    Route::resource('orders', 'OrderController');

});

Auth::routes();
