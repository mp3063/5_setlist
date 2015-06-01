<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Logic\Traits\Helpers;

class SetListController extends Controller
{

    use Helpers;



    public function __construct()
    {
        $this->middleware( 'auth' );
    }



    public function index()
    {
        $user = $this->findAuthUserById();
        $repertoar = $user->repertoar;

        return view( 'master-set-list', compact( 'repertoar' ) );
    }



    public function overview()
    {
        $repertoar = $this->userRepertoar();
        $chunk = $this->poReduPesama( 3 );

        return view( 'repertoar.overview', compact( 'repertoar',
                                                    'chunk' ) )->with( $this->flashMessageImportant( 'Click on songs to select it from master playlist!' ) );
    }
}
