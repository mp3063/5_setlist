<?php


namespace App\Logic\Auth;


use App\User;
use Hash;
use Input;

class Credentials
{

    public static function register()
    {
        return [
            'email'    => Input::get( 'email' ),
            'username' => Input::get( 'username' ),
            'password' => Hash::make( Input::get( 'password' ) ),
            'code'     => str_random( 60 ),
            'active'   => 0
        ];
    }

    public static function login()
    {
        return [
            'email'    => Input::get( 'email' ),
            'password' => Input::get( 'password' ),
            'active'   => 1
        ];
    }
}