<?php

Route::localizedGroup(function () {
    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('clients', 'Admin\IndexController');
        Route::put('clients/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.clients.priority');
        Route::delete('clients/delete-upload/{id}/{field}', 'Admin\IndexController@deleteUpload')->name('admin.clients.delete-upload');

    });
});
