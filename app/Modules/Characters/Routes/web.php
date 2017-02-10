<?php

Route::localizedGroup(function () {
    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('characters', 'Admin\IndexController');

        Route::put('characters/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.characters.priority');
        Route::delete('characters/delete-upload/{id}/{field}', 'Admin\IndexController@deleteUpload')->name('admin.characters.delete-upload');

    });

    Route::get('characters/random', 'CharactersController@getCharacter')->name('characters.random');

});




