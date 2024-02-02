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

<div class="container mt-3">
    <h1 class="text-center my-5">{{ $ticket->title }}</h1>
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


                        <h2 class="card-title mb-3">{{ $ticket->title}}</h2>

                        <h3 class="card-text mb-3"> {{ $ticket->dj }}</h3>
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
                            <a class="btn btn-primary" href="#">Join Event</a>
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

</div>



@endsection