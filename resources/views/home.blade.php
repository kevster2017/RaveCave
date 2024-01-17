@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card custom-card h-100">
                    <a href="{{ route('events.create') }}"><img src="/images/createEvent.jpg" class="card-img-top img-fluid" alt="turntable"></a>
                    <div class="card-body">
                        <h5 class="card-title">Create Event</h5>
                        <p class="card-text">Create a new Event</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card custom-card h-100">
                    <img src="/images/liveEvent.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Live Event</h5>
                        <p class="card-text">View live events here</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card custom-card h-100">
                    <img src="/images/newDJ.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Create New DJ Profile</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card custom-card h-100">
                    <img src="/images/eventImage.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection