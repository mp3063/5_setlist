<table class="table table-condensed">
    @foreach($repertoar as $pesma)
        <tr>
            <td>{{$pesma->band}} - {{$pesma->song}}</td>
            <td>
                <a class="btn btn-danger btn-xs" href="/repertoar/{{$pesma->id}}/edit">Update name</a>
                <a class="btn btn-success btn-xs" href="#">Add/Update Lyrics</a>
            </td>
        </tr>
    @endforeach
</table>
