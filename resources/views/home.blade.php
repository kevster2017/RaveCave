@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card custom-card h-100">
                    <a href="{{ route('events.create') }}"><img src="/images/createEvent.jpg" class="card-img-top img-fluid" alt="DJ and crowd dancing"></a>
                    <div class="card-body">
                        <h5 class="card-title">Create Event</h5>
                        <p class="card-text">Create a new Event</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card custom-card h-100">
                    <a href="{{ route('events.index') }}">
                        <img src="/images/liveEvent.jpg" class="card-img-top img-fluid" alt="Crowd dancing">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Live Event</h5>
                        <p class="card-text">View live events here</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card custom-card h-100">
                    <a href="{{ route('djs.create') }}">
                        <img src="/images/newDJ.jpg" class="card-img-top img-fluid" alt="DJ on vinyl turntables">
                    </a>

                    <div class="card-body">
                        <h5 class="card-title">Create New DJ Profile</h5>
                        <p class="card-text">Create your DJ profile here</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card custom-card h-100">
                    <a href="#">
                        <img src="/images/burger.jpg" class="card-img-top img-fluid" alt="DJ on MP3 decks">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Create a food business profile</h5>
                        <p class="card-text">Create your business profile here</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card custom-card h-100">
                    <a href="{{ route('myTickets') }}">
                        <img src="/images/eventImage.jpg" class="card-img-top img-fluid" alt="DJ on MP3 decks">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">View Tickets</h5>
                        <p class="card-text">View Your tickets here</p>
                    </div>
                </div>
            </div>

            @if(auth()->user()->isAdmin == 1)

            <div class="col">
                <div class="card custom-card h-100">
                    <a href=" {{ route('admins.home') }}"><img src="/images/allUsers.jpg" class="card-img-top img-fluid" alt="Ravers dancing"></a>
                    <div class="card-body">
                        <h5 class="card-title">Admin Options</h5>
                        <p class="card-text">View the list of Admin features</p>
                    </div>
                </div>
            </div>

            @endif


        </div>
    </div>
</div>
@endsection