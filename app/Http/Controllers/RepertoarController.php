<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RepertoarValidation;
use App\Logic\Traits\Helpers;
use App\Repertoar;
use Auth;
use Redirect;

class RepertoarController extends Controller
{

    use Helpers;

    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy( $id )
    {
        $pesma_delete = $this->findSong( $id );
        $pesma_delete->delete();

        return Redirect::to( '/' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit( $id )
    {
        $pesma_update = $this->findSong( $id );
        $repertoar    = Auth::user()->repertoar;
        if ($pesma_update) {
            return view( 'repertoar.edit',
                compact( 'pesma_update', 'repertoar' ) );
        }

        return Redirect::to( '/' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $repertoar = Auth::user()->repertoar;

        return view( 'repertoar.repertoar', compact( 'repertoar' ) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show( $id )
    {
        $pesma_show = $this->findSong( $id );
        if ($pesma_show) {
            return view( 'repertoar.show', compact( 'pesma_show' ) );
        }

        return Redirect::to( '/' );
    }

    /**
     * Store a newly created resource in storage.
     * Validacija Repertoar Form
     *
     * @param \App\Http\Requests\RepertoarValidation $request
     *
     * @return \App\Http\Controllers\Response
     */
    public function store( RepertoarValidation $request )
    {
        $pesma = new Repertoar( $request->all() );

        Auth::user()->repertoar()->save( $pesma );

        return Redirect::back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int                                   $id
     *
     * @param \App\Http\Requests\RepertoarValidation $request
     *
     * @return \App\Http\Controllers\Response
     */
    public function update( $id, RepertoarValidation $request )
    {
        $pesma_update = $this->findSong( $id );

        $pesma_update->update( $request->all() );

        return Redirect::to( '/' );

    }

}