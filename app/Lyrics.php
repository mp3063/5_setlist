<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lyrics extends Model {

	protected $table    = 'lyrics';
	protected $fillable = [ 'lyrics' ];

	public function pesma() {
		return $this->belongsTo( 'App\Repertoar', 'pesma_id', 'id' );
	}

}
