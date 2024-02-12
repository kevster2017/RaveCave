@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/events">All Events</a></li>

            <li class="breadcrumb-item"><a href="/events/show/{{ $event->id }}">{{ $event->title }} Page</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $event->title }} Live</li>
        </ol>
    </nav>
</div>

<div class="container-fluid eventImages mt-3" id="event">

    <img src="/images/valleypark.jpg" alt="Valley Park" class="event-image">
    <img src="/images/stage.png" alt="Stage" class="overlay-imageStage">
    <video class="video-overlay" controls>
        <source src="/storage/{{ $event->video }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <a href="{{ route('foods.index') }}" target="_blank">
        <img src="/images/burgerVan.png" alt="Burger Van" class="overlay-burgerVan">
    </a>
</div>
<div class="container mt-5">
    <div class="card d-none" id="messageCard">
        <div class="card-header">
            <button id="closeBtn" class="btn btn-danger float-end">&#x2716;</button>
            Messages
        </div>
        <div class="card-body" style="height: 300px; overflow-y: auto;">
            @if($messages)
            <ul class="list-group list-group-flush" id="messageList">
                <!-- Messages will be displayed here -->
                @foreach($messages as $message)
                <div class="row">
                    <div class="col-3">
                        <img src="/storage/{{ $message->image }}">
                    </div>
                    <div class="col=9">
                        <h6>{{ $messase->username }}</h6>
                        <p> {{message->message }}</p>
                    </div>
                </div>

                @endforeach
            </ul>
            @else
            <h3>No messages available</h3>
            @endif
        </div>
        <div class="card-footer">
            <form id="messageForm" method="POST" action="{{ route('messages.store') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id}} ">
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <input type="hidden" name="image" value="{{ auth()->user()->image }}">
                <input type="hidden" name="username" value="{{ auth()->user()->username }}">

                <div class="mb-3">
                    <textarea class="form-control" id="messageInput" name="message" rows="3" placeholder="Type a message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

        </div>
    </div>
    <button id="burgerBtn" class="btn btn-primary">&#9776;</button>
    </form>
</div>


<!-- Ajax request -->

<script>
    document.getElementById('messageForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the form data
        var formData = new FormData(this);

        // Send the form data via AJAX
        fetch(this.action, {
                method: this.method,
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (response.ok) {
                    // If the submission was successful, clear the input field
                    document.getElementById('messageInput').value = '';
                    // Parse the JSON response
                    return response.json();
                } else {
                    console.error('Form submission failed:', response.status, response.statusText);
                    throw new Error('Form submission failed');
                }
            })
            .then(data => {
                // Check if the response indicates success
                if (data.success) {
                    // Update the UI with the new message
                    var messageList = document.getElementById('messageList');
                    var listItem = document.createElement('li');
                    listItem.className = 'list-group-item';
                    listItem.textContent = data.message.message; // Assuming the response contains the message content
                    messageList.appendChild(listItem);
                } else {
                    console.error('Form submission failed:', data.error);
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Toggle message card visibility
    document.getElementById('burgerBtn').addEventListener('click', function() {
        var messageCard = document.getElementById('messageCard');
        messageCard.classList.toggle('d-none');
    });

    // Close message card and show burger button
    document.getElementById('closeBtn').addEventListener('click', function() {
        var messageCard = document.getElementById('messageCard');
        messageCard.classList.add('d-none');
    });
</script>


@endsection