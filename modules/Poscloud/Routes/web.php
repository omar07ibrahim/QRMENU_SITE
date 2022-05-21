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



Route::group([
    'middleware' =>[ 'web','impersonate'],
    'namespace' => 'Modules\Poscloud\Http\Controllers'
], function () {
    Route::prefix('poscloud')->group(function() {

        
        Route::get('/pos', 'Main@index')->name('poscloud.index');
        Route::get('/orders', 'Main@orders')->name('poscloud.orders');
        Route::post('/order','Main@store')->name('posccloud.storeorder');
        Route::post('/orderupdate','Main@update')->name('posccloud.updateorder');
        Route::get('/moveorder/{from}/{to}', 'Main@moveOrder')->name('poscloud.moveorder');
        
        
    });
});