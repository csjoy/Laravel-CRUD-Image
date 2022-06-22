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

Route::get('/', 'App\Http\Controllers\Frontend\ProductViewController@index');

Route::get('/admin', function () {
    return view('backend/index');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['prefix' => '/admin'], function () {
    Route::group(['prefix' => '/product'], function () {
        Route::get('/create', 'App\Http\Controllers\Backend\ProductController@create')->middleware(['auth'])->name('create');
        Route::post('/store', 'App\Http\Controllers\Backend\ProductController@store')->middleware(['auth'])->name('store');
        Route::get('/manage', 'App\Http\Controllers\Backend\ProductController@index')->middleware(['auth'])->name('manage');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ProductController@edit')->middleware(['auth'])->name('edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\ProductController@update')->middleware(['auth'])->name('update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\ProductController@destroy')->middleware(['auth'])->name('delete');
    });
});


Route::group(['prefix' => '/'], function () {
    Route::get('/home', 'App\Http\Controllers\Frontend\ProductViewController@index')->name('home');
    Route::get('/shop', 'App\Http\Controllers\Frontend\ProductViewController@shop')->name('shop');
    Route::get('/details/{id}', 'App\Http\Controllers\Frontend\ProductViewController@details')->name('details');
});
