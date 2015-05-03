<?php

Route::get( '/', 'RepertoarController@index' );
Route::get( '/overview', 'SetListController@overview' );
//Route::post( 'repertoar_create', 'RepertoarController@store' );
Route::controllers( [ 'auth'     => 'Auth\AuthController',
                      'password' => 'Auth\PasswordController', ] );
Route::resource( 'repertoar', 'RepertoarController' );