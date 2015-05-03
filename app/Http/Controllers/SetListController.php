<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Logic\PodelaPoRedovima\PodelaPoRedovima;
use App\Repertoar;
use App\User;
use Illuminate\Http\Request;

class SetListController extends Controller
{

    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        $user = $this->findUserId();

        $repertoar = $user->repertoar;

        return view( 'master-set-list', compact( 'repertoar' ) );
    }

    /**
     * @return \Illuminate\Support\Collection|null|static
     */
    public function findUserId()
    {
        if (\Auth::check()) {
            $user = User::find( \Auth::user()->id );

            return $user;
        }

        return false;
    }

    public function overview()
    {
        $repertoar = $this->userRepertoar();
        $chunk     = $this->poReduPesama3();

        return view( 'repertoar.overview', compact( 'repertoar', 'chunk' ) );
    }

    public function userRepertoar()
    {
        if ($this->findUserId()) {
            return $this->findUserId()->repertoar;
        }

        return false;
    }

    public function poReduPesama3()
    {
        return ( new PodelaPoRedovima( 3, new SetListController() ) )->poRedu();
    }
}
