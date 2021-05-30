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

Route::get('/', function () {
    return view('welcome', ['title' => 'Pangkasnesia']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/service', '\App\Http\Controllers\ServiceController@data');
Route::get('/service/add', '\App\Http\Controllers\ServiceController@add');
Route::post('/service', '\App\Http\Controllers\ServiceController@addProcess');
Route::get('/service/edit/{id}', '\App\Http\Controllers\ServiceController@edit');
Route::patch('service/{id}', '\App\Http\Controllers\ServiceController@editProcess');
Route::delete('service/{id}', '\App\Http\Controllers\ServiceController@delete');

Route::get('/product', '\App\Http\Controllers\ProductController@data');
Route::get('/product/add', '\App\Http\Controllers\ProductController@add');
Route::post('/product', '\App\Http\Controllers\ProductController@addProcess');
Route::get('/product/edit/{id}', '\App\Http\Controllers\ProductController@edit');
Route::patch('product/{id}', '\App\Http\Controllers\ProductController@editProcess');
Route::delete('product/{id}', '\App\Http\Controllers\ProductController@delete');

Route::get('/partner', '\App\Http\Controllers\PartnerController@data');
Route::get('/partner/add', '\App\Http\Controllers\PartnerController@add');
Route::post('/partner', '\App\Http\Controllers\PartnerController@addProcess');
Route::get('/partner/edit/{id}', '\App\Http\Controllers\PartnerController@edit');
Route::patch('partner/{id}', '\App\Http\Controllers\PartnerController@editProcess');
Route::delete('partner/{id}', '\App\Http\Controllers\PartnerController@delete');

Route::get('/member', '\App\Http\Controllers\MemberController@data');
Route::get('/member/add', '\App\Http\Controllers\MemberController@add');
Route::post('/member', '\App\Http\Controllers\MemberController@addProcess');
Route::get('/member/edit/{id}', '\App\Http\Controllers\MemberController@edit');
Route::patch('member/{id}', '\App\Http\Controllers\MemberController@editProcess');
Route::delete('member/{id}', '\App\Http\Controllers\MemberController@delete');
