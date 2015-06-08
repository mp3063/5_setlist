@extends('layouts.master')

@section('content')
    @if($chunk)
        <div class="container">
            <div>
                <div class="text-center animate-in" data-anim-type="fade-in-down">

                    <div class="btn-group caegories">

                        @foreach($genres as $genre)
                            <a href="#" data-filter=".{{$genre->genre}}" class="btn btn-danger">{{$genre->genre}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <br/>

            <div class="row">
                @for($i=0;$i<3;$i++)
                    @if(isset($chunk[$i]))
                        <div class="col-md-4 {{'kol-'.($i+1)}} work-wrapper">
                            @foreach($chunk[$i] as $deo) {{--povlacim pesme--}}
                            <?php $svi = [ ]?>
                            @foreach($deo->genre as $gen) {{--ulazim u pesmu i preko Belongs to povlacim genre--}}
                            <?php
                            $svi[] = $gen['genre']
                            ?>
                            @endforeach

                            <div class="repertoar-div {{ join(' ',$svi)}}">{{$deo['band']}} - {{$deo['song']}}</div>

                            @endforeach
                        </div>
                    @endif
                @endfor
            </div>
            <br/>

            <div class="button text-center">
                <button type="button" class="btn btn-success izaberi">Choose</button>
            </div>
        </div>
    @endif
@stop
