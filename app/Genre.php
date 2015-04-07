<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

	protected $table    = 'genre';
	protected $fillable = [ 'genre' ];

	public function repertoar() {
		return $this->belongsToMany( 'App\Repertoar', 'repertoar_genre', 'pesma_id',
		                             'genre_id' );
	}

}
