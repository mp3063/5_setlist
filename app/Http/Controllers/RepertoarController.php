<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RepertoarValidation;
use App\Repertoar;

class RepertoarController extends Controller
{


    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $repertoar = \Auth::user()->repertoar;

        return view( 'repertoar.repertoar', compact( 'repertoar' ) );
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

        \Auth::user()->repertoar()->save( $pesma );

        return \Redirect::back();
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
        $pesma_show = Repertoar::findSong( $id );
        if ($pesma_show) {
            return view( 'repertoar.show', compact( 'pesma_show' ) );
        }

        return \Redirect::to( '/' );
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
        $pesma_update = Repertoar::findSong( $id );
        $repertoar    = \Auth::user()->repertoar;
        if ($pesma_update) {
            return view( 'repertoar.edit',
                compact( 'pesma_update', 'repertoar' ) );
        }

        return \Redirect::to( '/' );
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
        $pesma_update = Repertoar::findSong( $id );

        $pesma_update->update( $request->all() );

        return \Redirect::to( '/' );

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
        $pesma_delete = Repertoar::findSong( $id );
        $pesma_delete->delete();

        return \Redirect::to( '/' );
    }

}
