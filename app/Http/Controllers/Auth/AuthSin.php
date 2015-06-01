<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Logic\Auth\Credentials;
use App\Logic\Auth\MailSend;
use App\Logic\Auth\Redirects;
use App\Logic\Auth\Validation;
use App\Logic\Traits\FlashMessage;
use App\User;
use Auth;
use Input;
use Redirect;
use View;

class AuthSin extends Controller
{

    use FlashMessage;



    public function getRegister()
    {
        return View::make( 'auth.register' );
    }



    public function postRegister()
    {
        Validation::register();
        $user = User::create( Credentials::register() );
        if ( $user ) {
            MailSend::register( $user );

            return Redirects::postRegister();
        }

        return Redirects::postRegister( false );
    }



    public function getActivate( $code )
    {
        if ( Credentials::getRegister( $code ) ) {
            return Redirects::getActivate();
        }

        return Redirects::getActivate( false );
    }



    public function postLogin()
    {
        Validation::login();
        $remember = Input::has( 'remember' ) ? true : false;
        $auth = Auth::attempt( Credentials::login(), $remember );
        if ( $auth ) {
            return Redirects::postLogin();
        }

        return Redirects::postLogin( false );
    }



    public function getLogin()
    {
        return View::make( '/auth/login' );
    }



    public function getLogout()
    {
        Auth::logout();

        return Redirect::intended( '/auth/login' );
    }



    public function getChangepassword()
    {
        if ( Auth::check() ) {
            return View::make( '/auth/changepassword' );
        }

        return Redirects::getChangePassword();
    }



    public function postChangepassword()
    {
        Validation::changePassword();
        if ( Credentials::postChangePassword() ) {
            return Redirects::postChangePassword();
        }

        return Redirects::postChangePassword( false );
    }



    public function getForgotpassword()
    {
        return View::make( '/auth/forgotpassword' );
    }



    public function postForgotpassword()
    {
        Validation::forgotPassword();
        list( $user, $password ) = Credentials::postForgotPassword();
        if ( $user ) {
            MailSend::forgotPassword( $user, $password );

            return Redirects::postForgotPassword();
        }

        return Redirects::postForgotPassword( false );
    }



    public function getRecover( $code )
    {
        if ( Credentials::getRecover( $code ) ) {
            return Redirects::getRecover();
        }

        return Redirects::getRecover( false );
    }
}