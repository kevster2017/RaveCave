@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Messages Index</li>
            <li class="breadcrumb-item active" aria-current="page">Message from {{ $contact->name }}</li>
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
                            <h1 class="text-center my-3">Message from {{ $contact->name }}</h1>
                            <div class="container">

                                <label for="subject"><strong>Message Received:</strong> {{ $contact->created_at }}</label>
                            </div>


                            <div class="container">

                                <label for="subject"><strong>Subject:</strong> {{ $contact->subject }}</label>
                            </div>

                            <div class="container mt-3">
                                <label for="description"><strong>Message::</strong>{{ $contact->message }}</label>
                            </div>







                            <div class="row my-5">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection