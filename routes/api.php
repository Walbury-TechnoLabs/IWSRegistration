<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Disciplines
    Route::apiResource('disciplines', 'DisciplinesApiController');

    // Portfolios
    Route::post('portfolios/media', 'PortfoliosApiController@storeMedia')->name('portfolios.storeMedia');
    Route::apiResource('portfolios', 'PortfoliosApiController');

    // Committees
    Route::post('committees/media', 'CommitteesApiController@storeMedia')->name('committees.storeMedia');
    Route::apiResource('committees', 'CommitteesApiController');

    // Enrollments
    Route::apiResource('enrollments', 'EnrollmentsApiController');
});
