@extends('layouts.master')

@section('content')
    @include('repertoar.partials.modal_form_add_song')
    {{--@include('repertoar.partials.modal_form_update_song')--}}
    <div class="container">
        {{--@if(Auth::check())--}}
        {{--<h4 class="text-center">{{Auth::user()->name}}</h4>--}}
        {{--@endif--}}
        <!-- Button trigger modal -->
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">
                    Add Song
                </button>
                <br/>
            </div>

        </div>
        {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
        @include('repertoar.petlje.lista_pesama')
        {{--</div>--}}
        {{--<div class="col-md-4">--}}

        {{--{!! Form::open(['url' => 'repertoar', 'method' => 'post']) !!}--}}
        {{--@include('repertoar.partials.repertoar_form',['submitButton'=>'Submit'])--}}
        {{--{!! Form::close() !!}--}}
        {{--</div>--}}
    </div>
    </div>
@stop
