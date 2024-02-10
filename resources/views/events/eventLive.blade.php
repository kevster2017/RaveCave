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
    <a href="https://www.just-eat.co.uk/" target="_blank">
        <img src="/images/burgerVan.png" alt="Burger Van" class="overlay-burgerVan">
    </a>
</div>





@endsection