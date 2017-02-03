<?php

Route::group(['prefix' => config('cms.uri')], function() {
    Route::resource('characters', 'Admin\IndexController');

    Route::put('characters/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.characters.priority');
    Route::delete('characters/delete-upload/{id}/{field}', 'Admin\IndexController@deleteUpload')->name('admin.characters.delete-upload');


});

Route::post('characters/random', ['as' => 'characters.random', 'uses' => 'CharactersController@getModel']);



