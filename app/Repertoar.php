<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Repertoar extends Model
{

    protected $table    = 'repertoar';
    protected $fillable = [ 'user_id', 'band', 'song', 'lyrics' ];


    public function genre()
    {
        return $this->belongsToMany( 'App\Genre', 'repertoar_genre', 'genre_id',
            'pesma_id' )->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo( 'App\User', 'user_id', 'id' );
    }

}
