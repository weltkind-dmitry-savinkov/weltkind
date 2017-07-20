<?php


Route::group(['prefix' => config('cms.uri')], function() {
    Route::resource('users', 'Admin\IndexController');

    #Route::get('news', 'App\Modules\News\Http\Controllers\Index@index');


});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout');
