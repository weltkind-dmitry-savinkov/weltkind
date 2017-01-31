<?php

Route::localizedGroup(function () {
    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('reviews', 'Admin\IndexController');

        Route::put('reviews/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.reviews.priority');
        Route::delete('reviews/delete-upload/{id}/{field}', 'Admin\IndexController@deleteUpload')->name('admin.reviews.delete-upload');

    });
});
