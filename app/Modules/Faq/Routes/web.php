<?php

Route::localizedGroup(function () {
    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('faq', 'Admin\IndexController');
        Route::put('faq/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.faq.priority');
    });
});
