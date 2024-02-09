@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="#">All Events</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </nav>
</div>

<div class="container-fluid eventImages mt-3" id="event">

    <img src="/images/valleypark.jpg" alt="Valley Park" class="event-image">
    <img src="/images/stage.jpg" alt="Stage" class="overlay-imageStage">
    <video class="video-overlay" controls>
        <source src="movie.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>





@endsection