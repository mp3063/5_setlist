@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-center"><h3 class="text-capitalize">{{$pesma_show->band}} - {{$pesma_show->song}}</h3><br/>
                <pre><h4>{{$pesma_show->lyrics}}</h4></pre>
            </div>
            @unless($pesma_show->genre->isEmpty())
                <div class="col-sm-6 text-center">
                    <h3 class="text-capitalize">Genre<br>
                        @foreach($pesma_show->genre as $genre)
                            <button class="btn btn-warning">{{$genre->genre}}</button>
                        @endforeach
                    </h3>
                </div>
            @endunless
        </div>
    </div>

@stop
