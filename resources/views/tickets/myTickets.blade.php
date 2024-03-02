@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Tickets</li>
        </ol>
    </nav>
</div>

<div class="container py-3">

    <h1 class="text-center">My Tickets</h1>

    @if(count($tickets) == 0)
    <h2 class="text-center mt-3">No tickets purchased. Click <a href="{{ route('events.index') }}">here</a> to view upcoming events</h2>
    @endif


    @foreach($tickets as $ticket)
    <div class="row">
        <div class="col-sm-8 mx-auto">

            <!-- List group-->
            <ul class="list-group">

                <!-- list group item-->
                <div class="card custom-card text-bg-light mb-3">
                    <li class="list-group-item">

                        <div class="my-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a href="{{ route('tickets.show', $ticket->id) }}"><img src="/storage/{{$ticket->image}}" class="img-responsive rounded-start img-fluid card-img" alt="Ticket Image"></a>
                                </div>
                                <div class="col ms-3">
                                    <div class="card-body">

                                        <a href="{{ route('tickets.show', $ticket->id) }}">
                                            <h5 class="card-title">{{ $ticket->title}}</h5>
                                        </a>


                                        <h6 class="card-text">{{ $ticket->dj}}</h6>
                                        <p class="card-text">{{ $ticket->date }} {{ $ticket->time }}</p>
                                        <p class="card-text">Price: £{{ $ticket->price }}</p>
                                        <p class="card-text">
                                            <small class="text-muted">Ticket Purchased: {{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}</small>
                                        </p>


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