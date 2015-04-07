<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLyricsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'lyrics', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'pesma_id' )->unsigned();
			$table->text( 'lyrics' );
			$table->timestamps();

			$table->foreign( 'pesma_id' )->references( 'id' )->on( 'repertoar' )
			      ->onDelete( 'cascade' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'lyrics' );
	}

}
