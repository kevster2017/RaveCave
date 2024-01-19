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


                </div>

                <div class="col mt-3 ms-5">
                    <div class="card-body">


                        <h2 class="card-title mb-3">{{ $dj->djname}}</h2>

                        <p class="card-text"><strong>Home Town:</strong> {{ $dj->town}}</p>
                        <p class="card-text"><strong>Country:</strong> {{ $dj->country }}</p>
                        <p class="card-text"><strong>Genre:</strong> {{ $dj->genre }}</p>
                        <p class="card-text"><small class="text-muted"><strong>Joined The Rave Cave:</strong> {{ $dj->created_at->diffForHumans() }}</small></p>


                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="row mb-5">
        <div class="col-4">
            <div class="card text-bg-light">
                <h5 class="card-header">Follow {{ $dj->djname }}</h5>
                <div class="card-body">
                    <div class="row text-center ms-3">
                        <div class="col">
                            <a class="btn btn-primary" href="#">Add to favourites</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary" href="#">Button 2</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary" href="#">Button 3</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-light">
                <h5 class="card-header">About {{ $dj->djname }}</h5>
                <div class="card-body">

                    <div class="ms-5">
                        <p class="card-text"><strong>Description:</strong> {{ $dj->town}}</p>
                        <p class="card-text"><strong>Social Media:</strong> {{ $dj->country }}</p>
                        <p class="card-text"><strong>Began DJ Career:</strong> {{ date('d/m/Y', strtotime($dj->date)) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection