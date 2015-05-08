@if(Session::has('flash_message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="alert alert-danger {{Session::has('flash_message_important'?'alert-important':'')}} text-center">

                @if(Session::has('flash_message_important'))
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                @endif
                {{Session::get('flash_message')}}
            </div>
        </div>
    </div>
@endif