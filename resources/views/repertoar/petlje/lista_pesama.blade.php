<table class="table table-condensed">
    @foreach($repertoar as $pesma)
        <tr>
            <td>{{$pesma->band}} - {{$pesma->song}}</td>
            <td>
                <a class="btn btn-primary btn-xs" href="/repertoar/{{$pesma->id}}">Overview</a>
                <a class="btn btn-danger btn-xs" href="/repertoar/{{$pesma->id}}/edit">Update Name/Lyrics</a>
                <a class="btn btn-success btn-xs" href="#">Add/Update Genre</a>
            </td>
        </tr>
    @endforeach
</table>
