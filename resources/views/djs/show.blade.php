@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('djs.index') }}">All DJs</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $dj->djname }}</li>
        </ol>
    </nav>
</div>

<div class="container mt-3">
    <h1 class="text-center my-5">{{ $dj->djname }}</h1>
</div>

<div class="container">
    <div class="card text-bg-light mb-3">
        <div class="my-2">
            <div class="row g-0">
                <div class="col-3">
                    <img src="/storage/{{$dj->image}}" class="img-responsive rounded-start m-3 img-fluid card-img" alt="dj Image">
                    <div class="text-center">
                        <a class="btn btn-primary mt-5" href="#">Add to favourites</a><br>
                        <a class="btn btn-primary mt-5" href="#">Button 2</a><br>
                        <a class="btn btn-primary mt-5" href="#">Button 3</a>
                    </div>

                </div>

                <div class="col mt-3 ms-5">
                    <div class="card-body">


                        <h2 class="card-title mb-3">{{ $dj->djname}}</h2>

                        <p class="card-text">Home Town: {{ $dj->town}}</p>
                        <p class="card-text">Country: {{ $dj->country }}</p>
                        <p class="card-text">Genre: {{ $dj->genre }}</p>
                        <p class="card-text"><small class="text-muted">Joined The Rave Cave: {{ $dj->created_at->diffForHumans() }}</small></p>

                    </div>
                </div>
            </div>



        </div>
    </div>

    <div class="card text-bg-light">
        <h5 class="card-header">Description</h5>
        <div class="card-body">
            <p class="card-text"> {{ $dj->description }}</p>
        </div>
    </div>
</div>



@endsection