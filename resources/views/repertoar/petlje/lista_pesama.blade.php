<table class="table table-condensed">
    @foreach($repertoar as $pesma)
        <tr>
            <td>{{$pesma->band}} - {{$pesma->song}}</td>
            <td><a class="btn btn-primary btn-xs" href="/repertoar/{{$pesma->id}}">Overview</a></td>
            <td><a class="btn btn-danger btn-xs" href="/repertoar/{{$pesma->id}}/edit">Update Name/Lyrics</a></td>
            <td>
                {!! Form::open(['route' => ['repertoar.destroy',$pesma->id], 'method' => 'delete','class'=>'form-inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                {!! Form::close() !!}
            </td>

            {{--<a class="btn btn-success btn-xs" href="#">Add/Update Genre</a>--}}

        </tr>
    @endforeach
</table>

