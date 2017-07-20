<?php
Route::localizedGroup(function () {

    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('feedback', 'Admin\IndexController');
    });

    Route::get('feedback-form', 'IndexController@modal')->name('feedback.modal');
    Route::post('feedback', 'IndexController@store')->name('feedback.store');

});