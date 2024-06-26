<div class="container">



    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
        Please check the form below for errors
    </div>
    @endif
</div>