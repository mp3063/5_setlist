@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if(Auth::check())
            <h4 class="text-center">{{Auth::user()->name}}</h4>
        @endif
        <div class="row">
            <div class="col-md-4">
                @foreach($repertoar as $pesma)
                    {{$pesma->band}} - {{$pesma->song}} <br/>
                @endforeach
            </div>
            <div class="col-md-4">
                {!! Form::open(['url' => 'repertoar', 'method' => 'post']) !!}
                @include('repertoar.partials.repertoar_form',['submitButton'=>'Submit'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
