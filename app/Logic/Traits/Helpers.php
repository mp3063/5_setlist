<?php


namespace App\Logic\Traits;


use App\Http\Controllers\SetListController;
use App\Logic\PodelaPoRedovima\PodelaPoRedovima;
use App\Repertoar;
use App\User;
use Auth;
use Session;

trait Helpers
{

    public static function findSong( $id )
    {
        $pesma = Repertoar::findOrFail( $id );
        if (Auth::id() == $pesma->user_id) {
            return $pesma;
        }
    }

    public function flashMessage( $message )
    {
        return Session::flash( 'flash_message', $message );
    }

    public function flashMessageImportant( $message )
    {
        return Session::flash( 'flash_message_important', $message );
    }

    public function poReduPesama( $divider )
    {
        return ( new PodelaPoRedovima( $divider,
            new SetListController() ) )->poRedu();
    }

    public function userRepertoar()
    {
        if ($this->findAuthUserById()) {
            return $this->findAuthUserById()->repertoar;
        }

        return false;
    }

    public function findAuthUserById()
    {
        if (Auth::check()) {
            return User::find( Auth::user()->id );
        }

        return false;
    }
}