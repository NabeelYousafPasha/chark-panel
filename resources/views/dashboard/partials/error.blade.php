@if ($errors->count() > 0)
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <div class="note note-danger">
            <ul class="{{--list-unstyled--}}">
                @foreach($errors->all() as $error)
                    <li>
                        <code>{{ $error }}</code>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
