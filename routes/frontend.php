<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'dashboard\DashboardController@dashboard')->name('home');
    Route::resource('bills', 'bill\BillController');
    Route::resource('expense', 'expense\ExpenseController');
    Route::resource('bank', 'bank\BankController');

    Route::get('/qrcode', 'bill\BillController@scanQrCode')->name('bill.qrcode');
    Route::get('/search', 'bill\BillController@searchBill')->name('bill.search');
    Route::get('/search/{qr_code}', 'bill\BillController@searchBillFromIndex')->name('bill.searches');

    Route::post('/getOrderById', 'AjaxController@getOrderById')->name('order.getSize');
    Route::post('/getRateBySize', 'AjaxController@getRateBySize')->name('size.getRate');
    Route::get('/getCustomerInfo', 'AjaxController@getCustomerInfo')->name('bill.getCustomerInfo');
    Route::get('/getRate', 'AjaxController@getRate')->name('bill.getRate');
    Route::get('/getIncome', 'AjaxController@getIncome')->name('bill.getIncome');
    Route::get('/getOpeningBalance', 'AjaxController@getOpeningBalance')->name('bill.getOpeningBalance');
    Route::post('/darkmode', 'AjaxController@darkmode')->name('frontend.darkmode');
    Route::get('autocompletephone', 'AjaxController@autocompletePhone')->name('autoCompletePhone');
    Route::post('getTransactionTitle', 'AjaxController@getTransactionTitle')->name('getTransactionTitle');

    Route::get('autocompleteSearch', 'AjaxController@autoCompleteSearch')->name('autoCompleteSearch');


    Route::resource('transactions', 'transaction\TransactionController');

    Route::resource('customers', 'customer\customerController');



    Route::get('customer/{id}', 'customer\customerController@search')->name('customerResult');
    Route::post('/adjustment', 'adjustment\AdjustmentController@store')->name('frontend.adjustment.store');
});
