<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Repertoar extends Model
{

    protected $table    = 'repertoar';
    protected $fillable = [ 'user_id', 'band', 'song' ];

    public function genre()
    {
        return $this->belongsToMany( 'App\Genre', 'repertoar_genre', 'genre_id',
            'pesma_id' )->withTimestamps();
    }

    public function text()
    {
        return $this->hasOne( 'App\Lyrics', 'pesma_id', 'id' );
    }

    public function user()
    {
        return $this->belongsTo( 'App\User', 'user_id', 'id' );
    }

    public static function findSong( $id )
    {
        $pesma = Repertoar::findOrFail( $id );
        if (\Auth::id() == $pesma->user_id) {
            return $pesma;
        }
    }
}
