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
                           ->with( self::flashMessageImportant( 'Va� nalog je kreiran! Poslali smo Vam email da bi ste ga aktivirali.' ) );
        }

        return Redirect::to( '/auth/register' )
                       ->with( self::flashMessageImportant( 'Nismo uspeli da kreiramo Va� nalog.' ) );
    }



    public static function getActivate( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessage( 'Va� nalog je aktiviran. Sada mo�ete da se ulogujete.' ) );
        }

        return Redirect::to( '/auth/login' )
                       ->with( self::flashMessageImportant( 'Nismo uspeli da aktiviramo Va� nalog. Probajte kasnije.' ) );
    }



    public static function postLogin( $true = true )
    {
        if ( $true == true ) {
            return Redirect::intended( '/' )
                           ->with( self::flashMessage( 'Ulogovani ste!' ) );
        }

        return Redirect::to( '/auth/login' )
                       ->with( self::flashMessageImportant( 'Email/�ifra su pogresni, ili niste aktivirali svoj nalog!' ) );
    }



    public static function getChangePassword( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessageImportant( 'Morate biti ulogovani da bi ste promenili �ifru' ) );
        }

        return null;
    }



    public static function postChangePassword( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/' )
                           ->with( self::flashMessage( 'Va�a �ifra je promenjena' ) );
        }

        return Redirect::to( '/auth/changepassword' )
                       ->with( self::flashMessage( 'Va�a �ifra ne mo�e biti promenjena. Uneti podaci se ne poklapaju sa onima u bazi!' ) );
    }



    public static function postForgotPassword( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessage( 'Poslali smo Vam novu �ifru.' ) );
        }

        return Redirect::to( '/auth/forgotpassword' )
                       ->with( self::flashMessage( 'Mejl koji ste uneli ne postoji u na�oj bazi.' ) );
    }



    public static function getRecover( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessage( 'Va� �ifra je uspe�no resetovana. Sada mo�ete da se ulogujete sa �ifrom koju smo Vam poslali!' ) );
        }

        return Redirect::to( '/auth/login' )
                       ->with( self::flashMessage( 'Nismo uspeli da vratimo Va� nalog!' ) );
    }
}