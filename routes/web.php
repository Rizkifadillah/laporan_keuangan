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
Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        return view('welcome');
    });

    //ini untuk master management sumber pemasukan
    Route::get('sumber-pemasukan', 'Sumber_controller@index');
    Route::get('sumber-pemasukan/add', 'Sumber_controller@add');
    Route::post('sumber-pemasukan/add', 'Sumber_controller@store');
    Route::get('sumber-pemasukan/{id}', 'Sumber_controller@edit');
    Route::put('sumber-pemasukan/{id}', 'Sumber_controller@update');
    Route::delete('sumber-pemasukan/{id}', 'Sumber_controller@delete');

    Route::get('pemasukan', 'Pemasukan_controller@index');
    Route::get('pemasukan/yajra', 'Pemasukan_controller@yajra');
    Route::get('pemasukan/add', 'Pemasukan_controller@add');
    Route::post('pemasukan/add', 'Pemasukan_controller@store');
    Route::get('pemasukan/{id}', 'Pemasukan_controller@edit');
    Route::put('pemasukan/{id}', 'Pemasukan_controller@update');
    Route::delete('pemasukan/{id}', 'Pemasukan_controller@delete');

    Route::get('pengeluaran', 'Pengeluaran_controller@index');
    Route::get('pengeluaran/yajra', 'Pengeluaran_controller@yajra');
    Route::get('pengeluaran/add', 'Pengeluaran_controller@add');
    Route::post('pengeluaran/add', 'Pengeluaran_controller@store');
    Route::get('pengeluaran/{id}', 'Pengeluaran_controller@edit');
    Route::put('pengeluaran/{id}', 'Pengeluaran_controller@update');
    Route::delete('pengeluaran/{id}', 'Pengeluaran_controller@delete');

    Route::get('laporan-keuangan', 'Laporan_controller@index');
    Route::get('cari-laporan', 'Laporan_controller@cari');


});

Auth::routes();

Route::get('/home',function(){
    return redirect('/');
});
