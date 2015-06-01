<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotRepertoarGenreTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'repertoar_genre', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'song_id' )->unsigned()->index();
            $table->integer( 'genre_id' )->unsigned()->index();
            $table->timestamps();
            $table->foreign( 'song_id' )->references( 'id' )->on( 'repertoar' )
                  ->onDelete( 'cascade' );
            $table->foreign( 'genre_id' )->references( 'id' )->on( 'genre' )
                  ->onDelete( 'cascade' );
        } );
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'repertoar_genre' );
    }

}
