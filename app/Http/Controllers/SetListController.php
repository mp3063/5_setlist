<?php namespace App\Http\Controllers;

use App\Genre;
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
        $user = $this->findAuthUserById();
        $genre = $user->genres->lists( 'genre_id' );
        $genres = Genre::findMany( $genre );
        $chunk = $this->poReduPesama( 3 );

        return view( 'repertoar.overview', compact( 'repertoar', 'chunk',
                                                    'genres' ) )/*->with( $this->flashMessageImportant( 'Click on songs to select it from master playlist!' ) )*/;
    }



    public function solidBlack()
    {
        return view( 'solid-black' );
    }
}
