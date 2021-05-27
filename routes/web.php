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

Route::prefix('admin')->group(function() {
    Route::get('/', 'FundController@index')->name('fund.show');
    Route::post('/fund/find', 'FundController@find')->name('fund.find');
    Route::post('/fund/edit/{id}', 'FundController@edit')->name('fund.edit');
    Route::post('/fund/save', 'FundController@save')->name('fund.save');

    Route::prefix('inventory')->group(function () {
        Route::get('/', 'InventoryController@index')->name('inventory.index');
        Route::post('/find', 'InventoryController@find')->name('inventory.find');
        Route::post('/edit/{id}', 'InventoryController@edit')->name('inventory.edit');
        Route::post('/save', 'InventoryController@save')->name('inventory.save');
    });

    Route::prefix('case')->group(function () {
        Route::get('/', 'CaseController@index')->name('case.index');
        Route::post('/find', 'CaseController@find')->name('case.find');
        Route::post('/edit/{id}', 'CaseController@edit')->name('case.edit');
        Route::post('/save', 'CaseController@save')->name('case.save');
    });

    Route::prefix('page')->group(function () {
        Route::get('/', 'PageController@index')->name('page.index');
        Route::post('/find', 'PageController@find')->name('page.find');
        Route::post('/edit/{id}', 'PageController@edit')->name('page.edit');
        Route::post('/save', 'PageController@save')->name('page.save');
    });

    Route::prefix('comments')->group(function () {
        Route::post('/show/{id}/{type}', 'CommentsController@show')->name('comments.find');
        Route::post('/edit/{id}', 'CommentsController@edit')->name('comments.edit');
        Route::post('/save', 'CommentsController@save')->name('comments.save');
    });
});

Route::namespace('PublicSite')->group(function() {
    Route::get('/', 'CommonController@funds')->name('funds.index');
    Route::get('/fund/{id?}', 'CommonController@index')->name('cases.index');
    Route::get('/case/{id}', 'CommonController@show')->name('view.case');

    Route::get('/show/{id}', function($id) {
        $case = \App\Models\Cases::findOrFail($id);
        return view('public.page.iframe', compact('case'));
    })->name('showcase');

    Route::prefix('search')->group(function() {
        Route::post('fund', 'CommonController@fundSearch')->name('fund.search');
        Route::post('cases', 'CommonController@caseSearch')->name('case.search');
        Route::post('search', 'CommonController@formSearch')->name('form.search');
    });
});

