<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormValidation;
use App\Logic\Auth\Credentials;
use App\Logic\Auth\MailSend;
use App\Logic\Auth\Messages;
use App\Logic\Auth\Validation;
use App\Logic\Traits\FlashMessage;
use App\User;
use Auth;
use Hash;
use Input;
use Redirect;
use View;
use Validator;
use Session;

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
        if ($user) {
            MailSend::register( $user );


            return Redirect::to( '/auth/login' )
                           ->with( $this->flashMessageImportant( 'Vaš nalog je kreiran! Poslali smo Vam email da bi ste ga aktivirali.' ) );
        }
    }

    public function getActivate( $code )
    {
        $user = User::where( 'code', '=', $code )->where( 'active', '=', 0 );

        if ($user->count()) {
            $user         = $user->first();
            $user->active = 1;
            $user->code   = '';
            if ($user->save()) {

                return Redirect::to( '/auth/login' )
                               ->with( $this->flashMessage( 'Vaš nalog je aktiviran!' ) );
            }
        }

        return Redirect::to( '/auth/login' )
                       ->with( $this->flashMessage( 'Nismo uspeli da aktiviramo Vaš nalog. Probajte kasnije.' ) );
    }

    public function postLogin()
    {
        Validation::login();
        $remember = Input::has( 'remember' ) ? true : false;
        $auth     = Auth::attempt( Credentials::login(), $remember );
        if ($auth) {
            return Redirect::intended( '/' );
        } else {
            return Redirect::to( '/auth/login' )
                           ->with( $this->flashMessage( 'Email/Šifra su pogresni, ili niste aktivirali svoj nalog!' ) );
        }


        return Redirect::to( '/auth/login' )
                       ->with( $this->flashMessage( 'Postoji problem, ne možemo da Vas ulogujemo. Da li ste aktivirali Vaš nalog?' ) );
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
        if (Auth::check()) {
            return View::make( '/auth/changepassword' );
        }

        return Redirect::to( '/auth/login' )
                       ->with( $this->flashMessageImportant( 'Morate biti ulogovani da bi ste promenili šifru' ) );
    }


    public function postChangepassword()
    {
        Validation::changePassword();
        $user         = User::find( Auth::user()->id );
        $old_password = Input::get( 'old_password' );
        $password     = Input::get( 'password' );

        if (Hash::check( $old_password, $user->getAuthPassword() )) {
            $user->password = Hash::make( $password );
            if ($user->save()) {
                return Redirect::to( '/' )
                               ->with( $this->flashMessage( 'Vaša šifra je promenjena' ) );
            }
        } else {
            return Redirect::to( '/auth/changepassword' )
                           ->with( $this->flashMessage( 'Vaša stara šifra je netačna!' ) );
        }


        return Redirect::route( '/auth/changepassword' )
                       ->with( $this->flashMessage( 'Vaša šifra ne može biti promenjena' ) );
    }

    public function getForgotpassword()
    {
        return View::make( '/auth/forgotpassword' );
    }


    public function postForgotpassword()
    {
        Validation::forgotPassword();

        $user = User::where( 'email', '=', Input::get( 'email' ) );
        if ($user->count()) {
            $user     = $user->first();
            $code     = str_random( 60 );
            $password = str_random( 10 );

            $user->code          = $code;
            $user->password_temp = Hash::make( $password );

            if ($user->save()) {
                MailSend::forgotPassword( $user, $password );

                return Redirect::to( '/' )
                               ->with( $this->flashMessage( 'Poslali smo Vam novu šifru.' ) );
            }
        }


        return Redirect::to( '/auth/forgotpassword' )
                       ->with( $this->flashMessage( 'Mejl koji ste uneli ne postoji u našoj bazi.' ) );
    }

    public function getRecover( $code )
    {
        $user = User::where( 'code', '=', $code )
                    ->where( 'password_temp', '!=', '' );
        if ($user->count()) {
            $user                = $user->first();
            $user->password      = $user->password_temp;
            $user->password_temp = '';
            $user->code          = '';

            if ($user->save()) {
                return Redirect::to( '/' )
                               ->with( $this->flashMessage( 'Vaš šifra je uspešno resetovana. Sada možete da se ulogujete sa šifrom koju smo Vam poslali!' ) );
            }
        }

        return Redirect::to( '/' )
                       ->with( $this->flashMessage( 'Nismo uspeli da vratimo Vaš nalog!' ) );
    }
}