@extends('layouts.master')

@section('content')
    {{--@include('repertoar.partials.modal_form_add_song')--}}
    <div class="container">
        {{--@if(Auth::check())--}}
            {{--<h4 class="text-center">{{Auth::user()->name}}</h4>--}}
        {{--@endif--}}
        <div class="row">
            {{--<div class="col-md-4">--}}
                {{--@include('repertoar.petlje.lista_pesama')--}}
            {{--</div>--}}
            <div class="col-md-6 col-md-offset-3">
                {!! Form::model($pesma_update,['method' => 'PATCH','url' => '/repertoar/'.$pesma_update->id ]) !!}
                @include('repertoar.partials.repertoar_form',['submitButton'=>'Update'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
