@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('myTickets') }}">My tickets</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $ticket->title }}</li>
        </ol>
    </nav>
</div>

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

<div class="container mt-3">
    <h1 class="text-center my-5">Your ticket to {{ $ticket->title }}</h1>
</div>

<div class="container">
    <div class="card text-bg-light mb-3">
        <div class="my-2">
            <div class="row g-0">
                <div class="col-4">
                    <img src="/storage/{{$ticket->image}}" class="img-responsive rounded-start m-3 img-fluid card-img" alt="Ticket Image">


                </div>

                <div class="col mt-3 ms-5">
                    <div class="card-body">


                        <h2 class="card-title mb-3"><a href="{{ route('events.show', $ticket->event_id) }}">{{ $ticket->title}}</a></h2>

                        <h3 class="card-text mb-3"><a href="#">{{ $ticket->dj }}</a> </h3>
                        <p class="card-text"><strong>Date:</strong> {{ date('d/m/Y', strtotime($ticket->date)) }}</p>
                        <p class="card-text"><strong>Time:</strong> {{ $ticket->time }} </p>



                    </div>
                </div>


            </div>



        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12 col-md-4">
            <div class="card text-bg-light">
                <h5 class="card-header">Follow {{ $ticket->title }}</h5>
                <div class="card-body">
                    <div class="row text-center ms-3">


                        <div class="col-12 col-md-3">
                            <a class="btn btn-primary" href="{{ route('events.join', $ticket->event_id) }}">Join Event</a>
                        </div>


                        <div class="col-12 col-md-3 mb-3 me-2">
                            <a class="btn btn-primary" href="#">Follow {{ $ticket->title }}</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-bg-light">
                <h5 class="card-header">About {{ $ticket->title }}</h5>
                <div class="card-body">

                    <div class="ms-5">
                        <p class="card-text"><strong>Description:</strong> {{ $ticket->event->description }}</p>
                        <p class="card-text"><strong>Ticket Price:</strong> £{{ $ticket->price }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($rateEvents && $rateEvents->user_id != auth()->user()->id)
    <div class="card">
        <div class="card-header">
            Rate This Event
        </div>
        <div class="card-body">
            <form id="ratingForm" action="{{ route('rateEvent') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="event_id" value="{{ $ticket->event_id }}">
                <input type="hidden" name="name" value="{{ Auth::user()->username }}">
                <input type="hidden" name="image" value="{{ Auth::user()->image }}">


                <div class="row">
                    <div class="col-4">
                        <div class="star-rating">
                            <h5 class="card-title text-center">Event Rating</h5>
                            <input type="radio" id="star5" name="stars" value="5" />
                            <label for="star5" title="5 stars">&#9733;</label>
                            <input type="radio" id="star4" name="stars" value="4" />
                            <label for="star4" title="4 stars">&#9733;</label>
                            <input type="radio" id="star3" name="stars" value="3" />
                            <label for="star3" title="3 stars">&#9733;</label>
                            <input type="radio" id="star2" name="stars" value="2" />
                            <label for="star2" title="2 stars">&#9733;</label>
                            <input type="radio" id="star1" name="stars" value="1" />
                            <label for="star1" title="1 star">&#9733;</label>
                        </div>
                    </div>
                    <div class="col-8">
                        <textarea class="form-control @error('comment') is-invalid @enderror mt-3" id="comment" name="comment" rows="3" placeholder="Enter a comment" required>{{ old('comment') }}</textarea>
                        @error('comment')
                        <label for="comment">Enter your comment</label>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn btn-primary mt-3">Submit Rating</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
    @endif
</div>

<script>
    const stars = document.querySelectorAll('.star-rating input[type="radio"]');
    stars.forEach(star => {
        star.addEventListener('change', (event) => {
            stars.forEach(s => {
                if (s !== event.target) {
                    s.checked = false;
                }
            });
        });
    });
</script>

@endsection