<?php
Route::get( '/', 'RepertoarController@index' );
Route::get( '/overview', 'SetListController@overview' );
//Route::post( 'repertoar_create', 'RepertoarController@store' );
Route::controllers( [ 'auth' => 'Auth\AuthSin', ] );
Route::resource( 'repertoar', 'RepertoarController' );
Route::post( '/register/create', 'Auth\AuthSinCtrl@postRegister' );