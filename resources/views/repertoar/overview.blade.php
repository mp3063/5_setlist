@extends('layouts.master')

@section('content')
        <div class="container">
            <div>
                <div class="text-center animate-in" data-anim-type="fade-in-down">

                    <div class="btn-group categories">

                        @foreach($genres as $genre)
                            <?php
                            $genr = str_replace(' ','',$genre->genre);
                            ?>
                            <a href="#" data-filter=".{{$genr}}" class="btn btn-danger">{{$genre->genre}}</a>

                        @endforeach
                            <a href="#" data-filter="*" class="btn btn-danger">All</a>
                    </div>
                </div>
            </div>
            <br/>

            <div class="grid">
                @if(isset($repertoar))
                    @foreach($repertoar as $pesma) {{--povlacim pesme--}}
                    <?php $svi = [ ]?>
                    @foreach($pesma->genre as $gen) {{--ulazim u pesmu i preko Belongs to povlacim genre--}}
                    <?php
                     $genr = str_replace(' ','',$gen['genre']);
                    $svi[] = $genr;
                    ?>
                    @endforeach

                    <div class="repertoar-div {{ join(' ',$svi)}}">{{$pesma->band}} - {{$pesma->song}}</div>
                    @endforeach
                @endif

            </div>
            <br/>

            <div class="button text-center">
                <button type="button" class="btn btn-success izaberi">Choose</button>
            </div>
        </div>
@stop
