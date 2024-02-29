@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Events</li>
        </ol>
    </nav>
</div>

<div class="container py-3">
    <h1 class="text-center my-3">All Events</h1>
    <div class="container col-sm-8 my-3 text-end">

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle position-relative" type="button" id="sortDropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Sort By
            </button>
            <ul class="dropdown-menu" aria-labelledby="sortDropdownMenuButton">
                <li><a class="dropdown-item" href="{{ route('events.priceLowHigh') }}">Price: Low to High</a></li>
                <li><a class="dropdown-item" href="{{ route('events.priceHighLow') }}">Price: High to Low</a></li>
                <li><a class="dropdown-item" href="{{ route('events.AtoZ') }}">Name: A to Z</a></li>
                <li><a class="dropdown-item" href="{{ route('events.ZtoA') }}">Name: Z to A</a></li>
                <li><a class="dropdown-item" href="{{ route('events.newestOldest') }}">Date: Newest to Oldest</a></li>
                <li><a class="dropdown-item" href="{{ route('events.oldestNewest') }}">Date: Oldest to Newest</a></li>

            </ul>
        </div>
    </div>



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