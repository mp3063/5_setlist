<?php
Route::get( '/', 'RepertoarController@index' );
Route::get( '/overview', 'SetListController@overview' );
Route::get( '/solid-black', 'SetListController@solidBlack' );
Route::controllers( [ 'auth' => 'Auth\AuthSin', ] );
Route::resource( 'repertoar', 'RepertoarController' );
