<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inv_Barang;
use App\Http\Controllers\Inv_Kategori;
use App\Http\Controllers\Inv_Dashboard;

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