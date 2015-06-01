@extends('layouts.master')

@section('content')
    @if($chunk)
        <div class="container">
            <div class="row">

                <table class="table table-condensed">
                    @if(isset($chunk[0]))
                        <div class="col-md-4 kol-1">
                            @foreach($chunk[0] as $deo)
                                <div class="repertoar-div">{{$deo['band']}} - {{$deo['song']}}</div>
                            @endforeach
                        </div>
                    @endif

                    @if(isset($chunk[1]))
                            <div class="col-md-4 kol-2">
                                @foreach($chunk[1] as $deo)
                                    <div class="repertoar-div">{{$deo['band']}} - {{$deo['song']}}</div>
                                @endforeach
                            </div>
                    @endif

                    @if(isset($chunk[2]))
                            <div class="col-md-4 kol-3">
                                @foreach($chunk[2] as $deo)
                                    <div class="repertoar-div">{{$deo['band']}} - {{$deo['song']}}</div>
                                @endforeach
                            </div>
                    @endif
                </table>

            </div>
            <div class="button text-center">
                <button type="button" class="btn btn-success izaberi">Choose</button>
            </div>
        </div>
    @endif
@stop
