<?php
namespace App\Logic\Auth;

use App\Logic\Traits\FlashMessage;
use Redirect;

class Redirects
{

    use FlashMessage;



    public static function postRegister( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessageImportant( 'Vaš nalog je kreiran! Poslali smo Vam email da bi ste ga aktivirali.' ) );
        }

        return Redirect::to( '/auth/register' )
                       ->with( self::flashMessageImportant( 'Nismo uspeli da kreiramo Vaš nalog.' ) );
    }



    public static function getActivate( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessage( 'Vaš nalog je aktiviran. Sada možete da se ulogujete.' ) );
        }

        return Redirect::to( '/auth/login' )
                       ->with( self::flashMessageImportant( 'Nismo uspeli da aktiviramo Vaš nalog. Probajte kasnije.' ) );
    }



    public static function postLogin( $true = true )
    {
        if ( $true == true ) {
            return Redirect::intended( '/' )
                           ->with( self::flashMessage( 'Ulogovani ste!' ) );
        }

        return Redirect::to( '/auth/login' )
                       ->with( self::flashMessageImportant( 'Email/Šifra su pogresni, ili niste aktivirali svoj nalog!' ) );
    }



    public static function getChangePassword( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessageImportant( 'Morate biti ulogovani da bi ste promenili šifru' ) );
        }

        return null;
    }



    public static function postChangePassword( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/' )
                           ->with( self::flashMessage( 'Vaša šifra je promenjena' ) );
        }

        return Redirect::to( '/auth/changepassword' )
                       ->with( self::flashMessage( 'Vaša šifra ne može biti promenjena. Uneti podaci se ne poklapaju sa onima u bazi!' ) );
    }



    public static function postForgotPassword( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessage( 'Poslali smo Vam novu šifru.' ) );
        }

        return Redirect::to( '/auth/forgotpassword' )
                       ->with( self::flashMessage( 'Mejl koji ste uneli ne postoji u našoj bazi.' ) );
    }



    public static function getRecover( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessage( 'Vaš šifra je uspešno resetovana. Sada možete da se ulogujete sa šifrom koju smo Vam poslali!' ) );
        }

        return Redirect::to( '/auth/login' )
                       ->with( self::flashMessage( 'Nismo uspeli da vratimo Vaš nalog!' ) );
    }
}