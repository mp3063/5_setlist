<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotRepertoarGenre extends Model {

	protected $table    = 'repertoar_genre';
	protected $fillable = [ 'song_id', 'genre_id' ];

}
