@extends('layouts.master')

@section('content')
    @if(Auth::check())
        <h4 class="text-center">{{Auth::user()->name}}</h4>
    @endif
@stop
