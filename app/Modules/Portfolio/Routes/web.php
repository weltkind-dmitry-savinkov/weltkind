<?php


Route::localizedGroup(function () {
    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('portfolio', 'Admin\IndexController');

        Route::put('portfolio/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.portfolio.priority');
        Route::delete('portfolio/delete-upload/{id}/{field}', 'Admin\IndexController@deleteUpload')->name('admin.portfolio.delete-upload');



        Route::resource('categories', 'Admin\CategoriesController');
        Route::put('categories/priority/{id}/{direction}', 'Admin\CategoriesController@priority')->name('admin.categories.priority');


        Route::resource('portfolio.images', 'Admin\ImagesController');

    });
});
