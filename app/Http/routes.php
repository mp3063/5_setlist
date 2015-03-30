<?php

Route::get( '/', 'SetListController@index' );
Route::controllers( [ 'auth'     => 'Auth\AuthController',
                      'password' => 'Auth\PasswordController', ] );
