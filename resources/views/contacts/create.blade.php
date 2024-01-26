@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
    </nav>
</div>

<div class="container-fluid" id="register">
    @if(count($errors) > 0 )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

        </button>
        <ul class="p-0 m-0" style="list-style: none;">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="row">
                    <div class="col-4 ">
                        <img src="/images/contactUs.jpg" class="img-fluid rounded-start h-100" alt="Ravers with the message Contact Us">
                    </div>

                    <div class="col-8">
                        <div class="card-body">
                            <h1 class="text-center my-3">Contact Us</h1>
                            <form method="POST" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->username }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->email }}">

                                <div class="form-floating my-3 col-10 offset-1">
                                    <input type="text" class="form-control" id="subject" placeholder="Enter subject of your message" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" required autocomplete="subject" autofocus>
                                    <label for="subject">Message Subject</label>
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>



                                <div class="form-floating my-3 col-10 offset-1">
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="100" placeholder="Enter a message" required>{{ old('message') }}</textarea>
                                    <label for="description">Message</label>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>





                                <div class="row my-5">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection