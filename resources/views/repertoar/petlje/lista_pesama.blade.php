<div class="row">
    <table class="table table-condensed">
        @foreach($repertoar as $pesma)

            <tr>
                <td class="col-sm-6">{{$pesma->band}} - {{$pesma->song}}</td>
                <td class="col-sm-1">
                    <a class="btn btn-success btn-xs btn-block" href="/repertoar/{{$pesma->id}}">Details</a></td>
                <td class="col-sm-1">
                    <a class="btn btn-primary btn-xs btn-block" href="/repertoar/{{$pesma->id}}/edit">Update</a>
                </td>
                <td class="col-sm-1">
                    {!! Form::open(['route' => ['repertoar.destroy',$pesma->id], 'method' => 'delete','class'=>'form-inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs btn-block']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>

        @endforeach
    </table>
</div>

