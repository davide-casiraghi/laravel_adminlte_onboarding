
{{--
    UPLOAD IMAGE

    IMPORTANT: when use this add to the form enctype="multipart/form-data"
                like: <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
    PARAMETERS:
        - $title: string - the title to show
        - $name: string - the select name attribute
        - $value: the already stored value (used in edit view to retrieve the already stored value, in create view can be '')
--}}

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        @if(!empty($value))
            <img src="{{asset('storage')}}/{{ $value }}" width="300px" >
        @endif
        <br>
        @if(!empty($title))<strong>{{$title}}:</strong>@endif
        <input type="file" name="{{$name}}" class="form-control" placeholder="image">
    </div>
</div>
