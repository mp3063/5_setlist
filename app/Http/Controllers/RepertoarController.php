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
        $repertoar = $this->userRepertoar();
        $select = $this->genreSelect();
        $genreIds = $pesma_update->genre_list;
        if ( $pesma_update ) {
            return view( 'repertoar.edit',
                         compact( 'pesma_update', 'repertoar', 'select',
                                  'genreIds' ) );
        }

        return Redirect::to( '/' );
    }



    public function index()
    {
        $repertoar = $this->userRepertoar();
        $select = $this->genreSelect();

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
        $this->syncGenreWithSongs( $genre, $request );
        $this->flashMessage( 'You successfully inserted song in the Master SetList!' );

        return Redirect::back();
    }



    public function update( $id, RepertoarValidation $request )
    {
        $pesma_update = $this->findSong( $id );
        $pesma_update->update( $request->all() );
        $this->syncGenreWithSongs( $pesma_update, $request );
        $this->flashMessage( 'You\'re successfully updated a song!' );

        return Redirect::to( '/' );

    }



    /**
     * @param                                        $instance
     * @param \App\Http\Requests\RepertoarValidation $request
     *
     * @internal param $pesma_update
     */
    private function syncGenreWithSongs( $instance, $request )
    {
        return $instance->genre()->sync( $request->input( 'genre_list' ) );
    }



    private function genreSelect()
    {
        return Genre::orderBy( 'genre', 'asc' )->lists( 'genre', 'id' );
    }

}