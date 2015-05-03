@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-6 text-center"><h3 class="text-capitalize">{{$pesma_show->band}} - {{$pesma_show->song}}</h3><br/>
            <pre><h4>{{$pesma_show->lyrics}}</h4></pre>
        </div>
    </div>

@stop
