<!-- Modal -->
<div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Enter band and song name</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($pesma_update,['method' => 'PATCH','url' => '/repertoar/'.$pesma_update->id ]) !!}
                {!! Form::label('band', 'Band', ['class' => 'control-label']) !!}
                {!! Form::text('band', NULL, ['class' => 'form-control']) !!}
                {!! Form::label('song', 'Song', ['class' => 'control-label']) !!}
                {!! Form::text('song', NULL, ['class' => 'form-control']) !!}

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
