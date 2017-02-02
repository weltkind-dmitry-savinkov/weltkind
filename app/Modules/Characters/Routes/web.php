<?php
Route::group(['prefix' => config('cms.uri')], function() {
    Route::resource('characters', 'Admin\IndexController');

});