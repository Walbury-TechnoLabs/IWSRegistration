<?php

Route::get('testMail', 'MailController@testMail');


Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('enroll/login/{committee}', 'EnrollmentController@handleLogin')->name('enroll.handleLogin')->middleware('auth');
Route::get('enroll/{committee}', 'EnrollmentController@create')->name('enroll.create');
Route::post('enroll/{committee}', 'EnrollmentController@store')->name('enroll.store');
Route::get('my-committees', 'EnrollmentController@myCommittees')->name('enroll.myCommittees')->middleware('auth');
Route::resource('committees', 'CommitteeController')->only(['index', 'show']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/submitform', 'HomeController@submitForm')->name('submitForm');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Disciplines
    Route::delete('disciplines/destroy', 'DisciplinesController@massDestroy')->name('disciplines.massDestroy');
    Route::resource('disciplines', 'DisciplinesController');

    // Portfolios
    Route::delete('portfolios/destroy', 'PortfoliosController@massDestroy')->name('portfolios.massDestroy');
    Route::post('portfolios/media', 'PortfoliosController@storeMedia')->name('portfolios.storeMedia');
    Route::resource('portfolios', 'PortfoliosController');

    // Committees
    Route::delete('committees/destroy', 'CommitteesController@massDestroy')->name('committees.massDestroy');
    Route::post('committees/media', 'CommitteesController@storeMedia')->name('committees.storeMedia');
    Route::resource('committees', 'CommitteesController');

    // Enrollments
    Route::delete('enrollments/destroy', 'EnrollmentsController@massDestroy')->name('enrollments.massDestroy');
    Route::resource('enrollments', 'EnrollmentsController');
    Route::get('assign-enrollments', 'AssignEnrollmentsController@index')->name('admin.assign.enrollments.index');
    Route::get('assign-enrollments/getPortfolio', 'AssignEnrollmentsController@getPortfolio');
    Route::get('assign-enrollments/getPortfolioCommittee', 'AssignEnrollmentsController@getPortfolioCommittee');
    Route::post('assign-enrollments/enrollmentSave', 'AssignEnrollmentsController@enrollmentSave');
    Route::put('assign-enrollments/updateStatus/{id}', 'AssignEnrollmentsController@updateStatus');
});


