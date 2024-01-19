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
                <div class="col-3">
                    <img src="/storage/{{$event->image}}" class="img-responsive rounded-start m-3 img-fluid card-img" alt="event Image">


                </div>

                <div class="col mt-3 ms-5">
                    <div class="card-body">


                        <h2 class="card-title mb-3">{{ $event->eventname}}</h2>

                        <p class="card-text"><strong>Home Town:</strong> {{ $event->town}}</p>
                        <p class="card-text"><strong>Country:</strong> {{ $event->country }}</p>
                        <p class="card-text"><strong>Genre:</strong> {{ $event->genre }}</p>
                        <p class="card-text"><small class="text-muted"><strong>Joined The Rave Cave:</strong> {{ $event->created_at->diffForHumans() }}</small></p>


                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12 col-md-4">
            <div class="card text-bg-light">
                <h5 class="card-header">Follow {{ $event->eventname }}</h5>
                <div class="card-body">
                    <div class="row text-center ms-3">
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <a class="btn btn-primary" href="#">Add to favourites</a>
                        </div>
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <a class="btn btn-primary" href="#">Button 2</a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a class="btn btn-primary" href="#">Button 3</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-bg-light">
                <h5 class="card-header">About {{ $event->eventname }}</h5>
                <div class="card-body">

                    <div class="ms-5">
                        <p class="card-text"><strong>Description:</strong> {{ $event->description}}</p>
                        <p class="card-text"><strong>Social Media:</strong> {{ $event->social }}</p>
                        <p class="card-text"><strong>Began event Career:</strong> {{ date('d/m/Y', strtotime($event->date)) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection