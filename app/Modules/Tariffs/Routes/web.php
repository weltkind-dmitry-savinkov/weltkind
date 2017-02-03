<?php

Route::localizedGroup(function () {
    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('tariffs', 'Admin\IndexController');
        Route::put('tariffs/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.tariffs.priority');
        Route::delete('tariffs/delete-upload/{id}/{field}', 'Admin\IndexController@deleteUpload')->name('admin.tariffs.delete-upload');

        Route::resource('tariffscategories', 'Admin\IndexController');
        Route::put('tariffscategories/priority/{id}/{direction}', 'Admin\TariffsCategoriesController@priority')->name('admin.tariffscategories.priority');
        Route::delete('tariffscategories/delete-upload/{id}/{field}', 'Admin\TariffsCategories@deleteUpload')->name('admin.tariffscategories.delete-upload');

    });

});




