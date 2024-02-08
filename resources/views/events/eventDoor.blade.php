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

<div class="container mt-3">
    <h1 class="text-center mt-5 mb-2">Welcome to {{ $event->title }}</h1>
    <h2 class="text-center my-2">Tap the scanner to enter</h2>
</div>

<div class="container-fluid" id="eventDoor">
    <img src="/images/doorstaff.jpg" alt="Event Door" class="event-image">

    <!-- Hidden Link -->
    <a href="#" class="hidden-link"></a>
</div>





@endsection