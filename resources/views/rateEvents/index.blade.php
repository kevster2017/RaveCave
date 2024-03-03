@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">All Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Event Ratings</li>
        </ol>
    </nav>
</div>

<div class="container py-3">

    <h1 class="text-center my-3">All Ratings</h1>


    @foreach($ratings as $rating)
    <div class="row">
        <div class="col-sm-8 mx-auto">

            <!-- List group-->
            <ul class="list-group">

                <!-- list group item-->
                <div class="card custom-card text-bg-light mb-3" id="cardStyle">
                    <li class="list-group-item">

                        <div class="my-2">
                            <div class="row g-0">
                                <div class="col-4">
                                    <img src="/storage/{{$user->image}}" class="img-responsive rounded-start m-3 img-fluid card-img" alt="user Image">

                                </div>
                                <div class="col ms-5">
                                    <div class="card-body">

                                        <h2 class="card-title">{{ $rating->eventName}}</h2>
                                        <h3 class="card-title">{{ $rating->name}}</h3>

                                        <div class="stars">
                                            @for ($i = 0; $i < 5; $i++) @if ($i < $rating->stars)
                                                <span class="star-filled">&#9733;</span>
                                                @else
                                                <span class="star">&#9733;</span>
                                                @endif
                                                @endfor
                                        </div>
                                        <p class="card-text">{{ $rating->comment }} </p>
                                        <p class="card-text"><small class="text-muted">Comment Added: {{ $rating->created_at->diffForHumans() }}</small></p>

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