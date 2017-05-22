<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

//Route::get('/', function () {
//    return view('template.webpage');
//});

Route::group(['namespace' => 'Admins'], function () {
    Route::get('/fundcreate', 'AdminController@getCreateF');
    Route::get('/createfund', 'AdminController@getCreateFund');
    Route::get('/newscreate', 'AdminController@getCreateN');
    Route::get('/createnews', 'AdminController@getCreateNews');
    Route::get('/usercompain', 'AdminController@getUsercompain');
    Route::get('/show', 'AdminController@getSelect');
    Route::get('/update', 'AdminController@getUpdate');
    Route::get('/edit', 'AdminController@getEdit');
    Route::get('/fundedit', 'AdminController@getSelect');
});
Route::group(['namespace' => 'fund'], function () {
    Route::get('/select', 'FundController@getFund');
    Route::get('/bank', 'FundController@getBank');
    Route::get('/result', 'FundController@getResult');
    Route::get('/cal', 'CalculateController@getIndex');
    Route::get('/calculate', 'CalculateController@getCalculate');
    Route::get('result/{fund}', 'FundController@getRisk');
    Route::get('result/nav/{fund}', 'FundController@getNV');
    Route::get('/risk', 'RiskController@getRisk');
    Route::get('/resultrisk', 'RiskController@getResult');
});

Route::group(['namespace' => 'News'], function () {
    Route::get('/', 'WebpageController@getNewshow');
    Route::get('/index', 'WebpageController@getIndex');
    Route::get('/news1', 'WebpageController@getNews');
    Route::get('/news2', 'WebpageController@getNews2');
    Route::get('/news3', 'WebpageController@getNews3');
    Route::get('/news4', 'WebpageController@getNews4');
    Route::get('/fundinfo', 'WebpageController@getFund');
    Route::get('/showSave', 'WebpageController@getProfile');
    Route::get('/showbank', 'WebpageController@getBank');
    Route::get('/contact', 'ContactController@getShowCm');
    Route::get('/comment', 'ContactController@getComment');
    Route::get('/home', 'WebpageController@getNewshow');
});


Route::group(['namespace' => 'Admins'], function () {

    Route::get('admin/index', 'DashboardController@getIndex');
    Route::post('admin/math', 'DashboardController@getCalculate');
});


Route::get('check-connect', function() {
    if (DB::connection()->getDatabaseName()) {
        return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
    } else {
        return 'Connection False !!';
    }
});



Auth::routes();


