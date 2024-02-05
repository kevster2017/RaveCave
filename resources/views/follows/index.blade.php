@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Followed Events</li>
        </ol>
    </nav>
</div>

<div class="container py-3">

    <h1 class="text-center my-3">My Followed Events</h1>


    @foreach($events as $event)
    <div class="row">
        <div class="col-sm-8 mx-auto">

            <!-- List group-->
            <ul class="list-group">

                <!-- list group item-->
                <div class="card text-bg-light mb-3" id="cardStyle">
                    <li class="list-group-item">

                        <div class="my-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a href="{{ route('events.show', $event->id) }}"><img src="/storage/{{$event->image}}" class="img-responsive rounded-start img-fluid card-img" alt="Event Image"></a>
                                </div>
                                <div class="col ms-3">
                                    <div class="card-body">

                                        <a href="{{ route('events.show', $event->id) }}">
                                            <h5 class="card-title">{{ $event->title}}</h5>
                                        </a>


                                        <h6 class="card-text">{{ $event->dj}}</h6>
                                        <p class="card-text">{{ $event->date }} {{ $event->time }}</p>
                                        <p class="card-text">Price: £5</p>
                                        <p class="card-text"><small class="text-muted">Event Created: {{ $event->created_at->diffForHumans() }}</small></p>

                                    </div>
                                </div>
                            </div>

                            <!-- End -->
                    </li>
                </div>
                <!-- End -->
            </ul>
        </div>
    </div>

    <br>
    @endforeach
</div>
@endsection