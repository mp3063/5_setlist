<?php namespace App\Http\Controllers;

use App\Genre;
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



    public function create()
    {

    }



    public function destroy( $id )
    {
        $this->findSong( $id )->delete();
        $this->flashMessage( 'You successfully deleted a song!' );

        return Redirect::to( '/' );
    }



    public function edit( $id )
    {
        $pesma_update = $this->findSong( $id );
        $repertoar = Auth::user()->repertoar;
        if ( $pesma_update ) {
            return view( 'repertoar.edit',
                         compact( 'pesma_update', 'repertoar' ) );
        }

        return Redirect::to( '/' );
    }



    public function index()
    {
        $repertoar = Auth::user()->repertoar;
        $select = Genre::lists( 'genre', 'id' );

        return view( 'repertoar.repertoar', compact( 'repertoar', 'select' ) );
    }



    public function show( $id )
    {
        $pesma_show = $this->findSong( $id );
        if ( $pesma_show ) {
            return view( 'repertoar.show', compact( 'pesma_show' ) );
        }
        $this->flashMessage( 'You don\'t have permission to access that song!!!' );

        return Redirect::to( '/' );
    }



    public function store( RepertoarValidation $request )
    {
        $pesma = new Repertoar( $request->all() );
        $genre = Auth::user()->repertoar()->save( $pesma );
        $genreIds = $request->input( 'genre' );
        $genre->genre()->attach( $genreIds );
        $this->flashMessage( 'You successfully inserted song in the Master SetList!' );

        return Redirect::back();
    }



    public function update( $id, RepertoarValidation $request )
    {
        $pesma_update = $this->findSong( $id );
        $pesma_update->update( $request->all() );
        $this->flashMessage( 'You\'re successfully updated a song!' );

        return Redirect::to( '/' );

    }

}