@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">All Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
        </ol>
    </nav>
</div>

<div class="container mt-3">
    <h1 class="text-center my-5">{{ $event->title }}</h1>
</div>

<div class="container">
    <div class="card text-bg-light mb-3">
        <div class="my-2">
            <div class="row g-0">
                <div class="col-4">
                    <img src="/storage/{{$event->image}}" class="img-responsive rounded-start m-3 img-fluid card-img" alt="Event Image">


                </div>

                <div class="col mt-3 ms-5">
                    <div class="card-body">


                        <h2 class="card-title mb-3">{{ $event->title}}</h2>

                        <h3 class="card-text mb-3"><a href="{{ route('djs.show', $event->dj_id) }}"> {{ $event->dj }}</a></h3>
                        <p class="card-text"><strong>Date:</strong> {{ date('d/m/Y', strtotime($event->date)) }}</p>
                        <p class="card-text"><strong>Time:</strong> {{ $event->time }} </p>
                        <div class="row mt-3">

                            <div class="col">
                                @if ($event->userID == auth()->user()->id)
                                <div class="col">
                                    <a class="btn btn-danger" href="{{ route('events.edit', $event->id) }}">Edit Event</a>
                                </div>
                                @endif
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col mt-3 ">
                    <div class="card-body">
                        <h2>Event Ratings</h2>

                        @if($rating != 0)
                        <div class="row">
                            <div class="stars">
                                @for ($i = 0; $i < 5; $i++) @if ($i < $rating) <span class="star-filled">&#9733;</span>
                                    @else
                                    <span class="star">&#9733;</span>
                                    @endif
                                    @endfor
                            </div>

                            <p>Ratings Count: ({{$totalRatingsCount}})</p>
                            <p><a href="{{ route('rateEvents.show', $event->id) }}">View all ratings</a></p>
                        </div>
                        @else
                        <div class="row">
                            <p>No ratings received</p>
                        </div>
                        @endif




                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12 col-md-4">
            <div class="card text-bg-light">
                <h5 class="card-header">Follow {{ $event->title }}</h5>
                <div class="card-body">
                    <div class="row">

                        @if($ticket && $ticket->paymentStatus === "Paid")
                        <div class="col">
                            <a class="btn btn-primary" href="{{ route('events.join', $ticket->event_id) }}">Join Event</a>
                        </div>

                        @else
                        <div class="row">
                            <form action="{{ route('addToCart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="userId" value="{{ Auth()->User()->id }}">
                                <input type="hidden" name="name" value="{{ Auth()->User()->name }}">
                                <input type="hidden" name="eventId" value="{{ $event->id }}">
                                <input type="hidden" name="title" value="{{ $event->title }}">
                                <input type="hidden" name="dj" value="{{ $event->dj }}">
                                <input type="hidden" name="djId" value="{{ $event->dj_id }}">
                                <input type="hidden" name="date" value="{{ $event->date }}">
                                <input type="hidden" name="time" value="{{ $event->time }}">
                                <input type="hidden" name="price" value="{{ $event->price }}">
                                <input type="hidden" name="image" value="{{ $event->image }}">
                                <input type="hidden" name="eventId" value="{{ $event->id }}">

                                <div class="d-flex align-items-center">
                                    <div class="col-4">
                                        <button class="btn btn-primary" type="submit">Buy Ticket</button>
                                    </div>
                                    <div class="col">
                                        <p class="mb-0 ms-3">({{ $ticketsSold }}) tickets sold </p>
                                    </div>

                                </div>

                            </form>
                        </div>
                        @endif


                        <div class="row mt-3">
                            @if(auth()->check() && $event->followedBy->contains(auth()->user()))
                            <form action="{{ route('events.unfollow', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex align-items-center">
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary">Unfollow</button>
                                    </div>
                                    <div class="col">
                                        <p class="mb-0 ms-3">({{ $followerCount }})
                                            @if($followerCount == 1)
                                            follower
                                            @else
                                            followers
                                            @endif
                                        </p>
                                    </div>
                                </div>

                            </form>
                            @else
                            <form action="{{ route('events.follow', $event->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <div class="d-flex align-items-center">
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary">Follow</button>
                                    </div>
                                    <div class="col">
                                        <p class="mb-0 ms-3">({{ $followerCount }}) followers</p>

                                    </div>
                                </div>

                            </form>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-bg-light">
                <h5 class="card-header">About {{ $event->title }}</h5>
                <div class="card-body">

                    <div class="ms-5">
                        <p class="card-text"><strong>Description:</strong> {{ $event->description }}</p>
                        <p class="card-text"><strong>Ticket Price:</strong> £{{ $event->price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>



@endsection