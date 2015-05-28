<?php


namespace App\Logic\Auth;


use Mail;
use URL;

class MailSend
{

    public static function register( $user )
    {
        Mail::send( 'emails.auth.activate', array(
            'link'     => URL::to( '/auth/activate', $user->code ),
            'username' => $user->username
        ), function ( $message ) use ( $user ) {
            $message->to( $user->email, $user->username )
                    ->subject( 'Aktivirajte Vaš nalog' );
        } );
    }

    public static function forgotPassword( $user, $password )
    {
        Mail::send( 'emails.auth.forgot', array(
            'link'     => URL::to( '/auth/recover', $user->code ),
            'username' => $user->username,
            'password' => $password
        ), function ( $message ) use ( $user ) {
            $message->to( $user->email, $user->username )
                    ->subject( 'Vaša nova šifra' );
        } );
    }
}