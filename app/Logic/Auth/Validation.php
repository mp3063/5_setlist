<?php


namespace App\Logic\Auth;


use App\Http\Requests\RegisterFormValidation;
use Input;
use Redirect;
use Validator;


class Validation
{

    public static function register()
    {
        $validator = Validator::make( Input::all(), array(
            'email'                 => 'required|max:50|email|unique:users',
            'username'              => 'required|max:20|min:3|unique:users',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ), Messages::register() );

        if ($validator->fails()) {
            return Redirect::to( '/auth/register' )
                           ->withErrors( $validator )
                           ->withInput();
        }

        return $validator;
    }

    public static function login()
    {
        $validator = Validator::make( Input::all(), array(
            'email'    => 'required',
            'password' => 'required'
        ), Messages::login() );

        if ($validator->fails()) {
            return Redirect::to( '/auth/login' )
                           ->withErrors( $validator )
                           ->withInput();
        }

        return $validator;
    }

    public static function changePassword()
    {
        $validator = Validator::make( Input::all(), array(
            'old_password'   => 'required',
            'password'       => 'required|min:6',
            'password_again' => 'required|same:password'
        ), Messages::changePassword() );

        if ($validator->fails()) {
            Redirect::to( '/auth/changepassword' )->withErrors( $validator );
        }

        return $validator;
    }

    public static function forgotPassword()
    {
        $validator = Validator::make( Input::all(),
            array( 'email' => 'required|email' ), Messages::forgotPassword() );

        if ($validator->fails()) {
            return Redirect::to( '/auth/forgotpassword' )
                           ->withErrors( $validator )
                           ->withInput();
        }

        return $validator;
    }
}