<?php
Route::group(['prefix' => config('cms.uri')], function() {
    Route::resource('blog', 'Admin\IndexController');

});