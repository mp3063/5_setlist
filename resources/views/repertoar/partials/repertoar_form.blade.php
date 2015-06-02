<div class="form-group">
    {!! Form::text('band', null, ['class' => 'form-control','placeholder'=>'Band']) !!}
    <p>{{$errors->first('band')}}</p>
</div>
<div class="form-group">
    {!! Form::text('song', null, ['class' => 'form-control','placeholder'=>'Song']) !!}
    <p>{{$errors->first('song')}}</p>
</div>
<div class="form-group">
    {!! Form::textarea('lyrics', null, ['class' => 'form-control','placeholder'=>'Lyrics']) !!}
    <p>{{$errors->first('lyrics')}}</p>
</div>
<div class="form-group">
    {!! Form::select('genre_list[]',$select,null,['class'=>'form-control','multiple']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'form-control btn btn-danger']) !!}
</div>
