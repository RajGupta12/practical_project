<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::post('update_image', 'RestaurantController@update_image')->name('restaurant.update_image');
    Route::apiResource('restaurants', 'RestaurantController');
});
