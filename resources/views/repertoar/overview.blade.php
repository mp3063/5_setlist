@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <table class="table table-condensed">
                <div class="col-md-4">
                    @foreach($chunk[0] as $deo)
                        <div class="repertoar-div">{{$deo['band']}} - {{$deo['song']}}</div>
                    @endforeach
                </div>


                <div class="col-md-4">
                    @foreach($chunk[1] as $deo)
                        <div class="repertoar-div">{{$deo['band']}} - {{$deo['song']}}</div>
                    @endforeach
                </div>


                <div class="col-md-4">
                    @foreach($chunk[2] as $deo)
                        <div class="repertoar-div">{{$deo['band']}} - {{$deo['song']}}</div>
                    @endforeach
                </div>
            </table>
        </div>

    </div>
@stop
