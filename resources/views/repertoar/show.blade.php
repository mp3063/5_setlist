@extends('layouts.master')

@section('content')
    <div class="text-center">
        <h2>{{$pesma_show->band}} - {{$pesma_show->song}}</h2><br/>

        {{--<div class="row">--}}
            {{--<div class="col-md-4 col-md-offset-4">--}}
                <pre><h3>{{$pesma_show->lyrics}}</h3></pre>
            {{--</div>--}}
        {{--</div>--}}

    </div>

@stop
