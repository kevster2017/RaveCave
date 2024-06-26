@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}'s Profile</li>
        </ol>
    </nav>
</div>

<div class="container mt-3">
    <h1 class="text-center my-5">{{ $user->name }}'s Profile</h1>
</div>

<div class="container">
    <div class="card text-bg-light mb-3">
        <div class="my-2">
            <div class="row g-0">
                <div class="col-3">
                    @if($user->image != "images/profileImage.jpg")
                    <img src="/storage/{{$user->image}}" class="img-responsive rounded-start m-3 img-fluid card-img" alt="user Image">
                    @else
                    <img src="/images/profileImage.jpg" class="img-responsive rounded-start m-3 img-fluid card-img" alt="user Image">
                    @endif

                </div>

                <div class="col mt-2 ms-5">
                    <div class="card-body">


                        <h2 class="card-title mb-3">{{ $user->name}}</h2>

                        <p class="card-text"><strong>Home Town:</strong> {{ $user->town}}</p>
                        <p class="card-text"><strong>Country:</strong> {{ $user->country }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="card-text"><small class="text-muted"><strong>Joined The Rave Cave:</strong> {{ $user->created_at->diffForHumans() }}</small></p>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-danger" href="{{ route('users.edit', auth()->user()->id) }}">Edit Profile</a>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="#">Reset Password</a>
                            </div>


                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12 col-md-4">
            <div class="card text-bg-light">
                <h5 class="card-header">Buttons</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <a class="btn btn-primary" href="{{ route('myTickets') }}">MyTickets</a>
                        </div>
                        <div class="col">
                            <p>({{ $tickets }}) Tickets</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <a class="btn btn-primary" href="{{ route('favourites.index') }}">Favourite DJs</a>
                        </div>
                        <div class="col">
                            <p>({{ $favourites }}) Favourites</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <a class="btn btn-primary" href="{{ route('follows.index') }}">Followed Events</a>
                        </div>
                        <div class="col">
                            <p>({{ $follows }}) All Followed Events</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-bg-light">
                <h5 class="card-header">About</h5>
                <div class="card-body">

                    <div class="ms-5">
                        <p class="card-text"><strong>Is Admin:</strong> {{ $user->isAdmin}}</p>
                        <p class="card-text"><strong>Social Media:</strong> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection