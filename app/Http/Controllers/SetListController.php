<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SetListController extends Controller {

	public function __construct() {
		$this->middleware( 'auth' );
	}

	public function index() {
		return view( 'master-set-list' );
	}

}
