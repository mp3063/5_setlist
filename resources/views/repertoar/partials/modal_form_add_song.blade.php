<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Enter band and song name, and lyrics!</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'repertoar.store', 'method' => 'post']) !!}
                {!! Form::label('band', 'Band', ['class' => 'control-label']) !!}
                {!! Form::text('band', null, ['class' => 'form-control']) !!}
                {!! Form::label('song', 'Song', ['class' => 'control-label']) !!}
                {!! Form::text('song', null, ['class' => 'form-control']) !!}

                <!--- Lyrics Field --->
                <div class="form-group">
                    {!! Form::label('lyrics', 'Lyrics') !!}
                    {!! Form::textarea('lyrics', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::select('genre_list[]',$select,null,['class'=>'form-control','multiple']) !!}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>

