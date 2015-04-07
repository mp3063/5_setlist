<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotRepertoarGenre extends Model {

	protected $table    = 'repertoar_genre';
	protected $fillable = [ 'pesma_id', 'genre_id' ];

}
