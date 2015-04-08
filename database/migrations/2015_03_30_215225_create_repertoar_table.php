<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepertoarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'repertoar', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'user_id' )->unsigned();
			$table->string( 'band' );
			$table->string( 'song' );
			$table->string( 'lyrics' );
			$table->timestamps();

			$table->foreign( 'user_id' )->references( 'id' )->on( 'users' )
			      ->onUpdate( 'cascade' )->onDelete( 'cascade' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'repertoar' );
	}

}
