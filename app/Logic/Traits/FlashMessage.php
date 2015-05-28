<?php
namespace App\Logic\Traits;

use Session;

trait FlashMessage
{

    public function flashMessage( $message )
    {
        return Session::flash( 'flash_message', $message );
    }



    public function flashMessageImportant( $message )
    {
        return Session::flash( 'flash_message_important', $message );
    }
}