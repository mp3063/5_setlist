<?php


namespace App\Logic\PodelaPoRedovima;


use App\Http\Controllers\SetListController;
use App\Logic\Traits\Helpers;

class PodelaPoRedovima
{

    use Helpers;

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
        if ($this->offset() > 0) {
            $chunk = $repertoar->chunk( $this->offset() );

            return $chunk;
        }
    }

    public function offset()
    {
        $repertoar  = $this->setList->userRepertoar();
        $brojPesama = $repertoar->count();
        $poRedu     = ceil( $brojPesama / $this->divider );

        return $poRedu;
    }
}