@if (Session::has('message'))
    <div class="alert alert-info alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <div class="note note-info">
            <p>{{ Session::get('message') }}</p>
        </div>
    </div>
@endif
