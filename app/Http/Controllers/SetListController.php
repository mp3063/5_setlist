<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repertoar;
use App\User;
use Illuminate\Http\Request;

class SetListController extends Controller {

	public function __construct() {
		$this->middleware( 'auth' );
	}

	public function index() {
		if ( \Auth::check() ) {
			$user = User::find( \Auth::user()->id );
		}

		$repertoar = $user->repertoar;

		return view( 'master-set-list', compact( 'repertoar' ) );
	}



}
