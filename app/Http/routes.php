<?php
Route::get( '/', 'RepertoarController@index' );
Route::get( '/overview', 'SetListController@overview' );
Route::controllers( [ 'auth' => 'Auth\AuthSin', ] );
Route::resource( 'repertoar', 'RepertoarController' );
