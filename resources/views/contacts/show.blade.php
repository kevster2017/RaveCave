@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('messages.index') }}">Messages Index</a></li>
            <li class=" breadcrumb-item active" aria-current="page">Message from {{ $contact->name }}</li>
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

                                <label for="subject"><strong>Message Received:</strong> {{ $contact->created_at->diffForHumans() }}</label>
                            </div>


                            <div class="container mt-3">

                                <label for="subject"><strong>Subject:</strong> {{ $contact->subject }}</label>
                            </div>

                            <div class="container mt-3">
                                <label for="description"><strong>Message:</strong>{{ $contact->message }}</label>
                            </div>



                            <div class="row my-5">
                                <div class="col text-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteContactModal{{ $contact->id }}">
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteContactModal{{ $contact->id }}" tabindex="-1" aria-labelledby="deleteContactModalLabel{{ $contact->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteContactModalLabel">Delete {{ $contact->name }}'s message?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Deleting this message is permanent and cannot be undone!
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Delete Message</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col text-center">
                                    <button class="btn btn-info" onclick="replyToEmail()">Reply</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

<script>
    function replyToEmail() {
        var emailAddress = "{{ $contact->email }}"; // Email address fetched from the database

        // Create the mailto link with the fetched email address
        var mailtoLink = "mailto:" + "{{ $contact->email }}";

        // Open the mailto link in a new tab
        window.open(mailtoLink, '_blank');
    }
</script>
@endsection