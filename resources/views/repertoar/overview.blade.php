@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <table class="table table-condensed">
                <div class="col-md-4 kol-1">
                    @foreach($chunk[0] as $deo)
                        <div class="repertoar-div">{{$deo['band']}} - {{$deo['song']}}</div>
                    @endforeach
                </div>


                <div class="col-md-4 kol-2">
                    @foreach($chunk[1] as $deo)
                        <div class="repertoar-div">{{$deo['band']}} - {{$deo['song']}}</div>
                    @endforeach
                </div>


                <div class="col-md-4 kol-3">
                    @foreach($chunk[2] as $deo)
                        <div class="repertoar-div">{{$deo['band']}} - {{$deo['song']}}</div>
                    @endforeach
                </div>
            </table>
        </div>
        <div class="button text-center">
            <button type="button" class="btn btn-success izaberi">Choose</button>
        </div>
    </div>
@stop
