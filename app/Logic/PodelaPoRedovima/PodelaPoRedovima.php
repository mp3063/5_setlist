<?php


namespace App\Logic\PodelaPoRedovima;


use App\Http\Controllers\SetListController;

class PodelaPoRedovima
{

    public $setList;
    public $divider;

    public function __construct( $divider, SetListController $setList )
    {
        $this->setList = $setList;
        $this->divider = $divider;
    }

    public function poRedu()
    {
        $repertoar = $this->setList->userRepertoar();
        $chunk     = $repertoar->chunk( $this->offset() );

        return $chunk;
    }

    public function offset()
    {
        $repertoar  = $this->setList->userRepertoar();
        $brojPesama = $repertoar->count();
        $poRedu     = ceil( $brojPesama / $this->divider );

        return $poRedu;
    }
}