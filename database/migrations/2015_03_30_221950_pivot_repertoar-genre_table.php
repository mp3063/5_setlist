<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivotRepertoarGenreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'repertoar_genre', function ( Blueprint $table ) {
			$table->integer( 'pesma_id' )->unsigned()->index();
			$table->integer( 'genre_id' )->unsigned()->index();
			$table->timestamps();

			$table->foreign( 'pesma_id' )->references( 'id' )->on( 'repertoar' )
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
	public function down() {
		Schema::drop( 'repertoar_genre' );
	}

}
