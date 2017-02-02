<?php

Route::group(['prefix' => config('cms.uri')], function() {
    Route::resource('characters', 'Admin\IndexController');
});

Route::post('/', ['as' => 'characters.random', 'uses' => 'CharactersController@getModel']);

