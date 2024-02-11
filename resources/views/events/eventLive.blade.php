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
            <ul class="list-group list-group-flush" id="messageList">
                <!-- Messages will be displayed here -->
            </ul>
        </div>
        <div class="card-footer">
            <form id="messageForm" method="POST" action="{{ route('messages.store') }}">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" id="messageInput" name="message" rows="3" placeholder="Type a message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <button id="burgerBtn" class="btn btn-primary">&#9776;</button>
</div>

<!-- Custom JavaScript -->
<script>
    // Function to handle form submission
    document.getElementById('messageForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the input message value
        var message = document.getElementById('messageInput').value.trim();

        // If the message is not empty
        if (message !== '') {
            // Append the message to the list
            var messageList = document.getElementById('messageList');
            var listItem = document.createElement('li');
            listItem.className = 'list-group-item';
            listItem.textContent = message;
            messageList.appendChild(listItem);

            // Clear the input field
            document.getElementById('messageInput').value = '';
        }
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