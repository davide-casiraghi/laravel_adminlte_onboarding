@if ($message = Session::get('success'))
    <div class="alert alert-success mt-4" role="alert">
        {{ $message }}
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger mt-4" role="alert">
        {{ $message }}
    </div>
@endif