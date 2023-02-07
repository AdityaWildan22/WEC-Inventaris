<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inv_Barang;
use App\Http\Controllers\Inv_Kategori;
use App\Http\Controllers\Inv_Dashboard;
use App\Http\Controllers\Inv_Perbaikan;
use App\Http\Controllers\Inv_User;

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

//Dashboard
Route::get('/',[Inv_Dashboard::class,'index']);

//Route Barang
Route::get('/barang',[Inv_Barang::class,'index']);
Route::get('/barang/form/{id?}',[Inv_Barang::class,'form']);
Route::post('/barang/save',[Inv_Barang::class,'save']);
Route::get('/barang/delete/{id}',[Inv_Barang::class,'delete']);

//Route Kategori
Route::get('/kategori',[Inv_Kategori::class,'index']);
Route::get('/kategori/form/{id?}',[Inv_Kategori::class,'form']);
Route::post('/kategori/save',[Inv_Kategori::class,'save']);
Route::get('/kategori/delete/{id}',[Inv_Kategori::class,'delete']);

//Route Perbaikan
Route::get('/perbaikan',[Inv_Perbaikan::class,'index']);
Route::get('/perbaikan/form/{id?}',[Inv_Perbaikan::class,'form']);
Route::post('/perbaikan/save',[Inv_Perbaikan::class,'save']);

//Route User
Route::get('/user',[Inv_User::class,'index']);
Route::get('/user/form/{id?}',[Inv_User::class,'form']);
Route::post('/user/save',[Inv_User::class,'save']);