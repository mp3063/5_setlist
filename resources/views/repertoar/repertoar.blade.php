@extends('layouts.master')

@section('content')
    @include('repertoar.partials.modal_form_add_song')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">
                    Add Song
                </button>
                <br/>
            </div>

        </div>

        @include('repertoar.petlje.lista_pesama')

    </div>
    </div>
@stop
