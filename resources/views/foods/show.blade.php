@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('djs.index') }}">All Food Businesses</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $food->businessName }}</li>
        </ol>
    </nav>
</div>

<div class="container mt-3">
    <h1 class="text-center my-5">{{ $food->djname }}</h1>
</div>

<div class="container">
    <div class="card text-bg-light mb-3">
        <div class="my-2">
            <div class="row g-0">
                <div class="col-3">
                    <img src="/storage/{{$food->image}}" class="img-responsive rounded-start m-3 img-fluid card-img" alt="Business Image">


                </div>

                <div class="col mt-3 ms-5">
                    <div class="card-body">


                        <h2 class="card-title mb-3">{{ $food->businessName}}</h2>

                        <p class="card-text"><strong>Home Town:</strong> {{ $food->town}}</p>
                        <p class="card-text"><strong>Food Type:</strong> {{ $food->type }}</p>
                        <p class="card-text"><small class="text-muted"><strong>Joined The Rave Cave:</strong> {{ $food->created_at->diffForHumans() }}</small></p>


                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12 col-md-4">
            <div class="card text-bg-light">
                <h5 class="card-header">Follow {{ $food->businessName }}</h5>
                <div class="card-body">
                    <div class="row justify-content-between ms-3">

                        <div class="col">
                            @if( $food->user_id == auth()->user()->id)

                            <a class="btn btn-danger" href="{{ route('foods.edit', $food->id) }}">Edit Profile</a>

                            @endif
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-bg-light">
                <h5 class="card-header">About {{ $food->businessName }}</h5>
                <div class="card-body">

                    <div class="ms-5">
                        <p class="card-text"><strong>Description:</strong> {{ $food->description}}</p>
                        <p class="card-text"><strong>Web Link:</strong> <a href="{{ $food->webLink}}">Click to view web page for {{ $food->businessName }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection