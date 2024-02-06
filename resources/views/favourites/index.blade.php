@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Favourite DJs</li>
        </ol>
    </nav>
</div>

<div class="container py-3">

    <h1 class="text-center">My Favourite DJs</h1>


    @foreach($favourites as $favourite)
    <div class="row">
        <div class="col-sm-8 mx-auto">

            <!-- List group-->
            <ul class="list-group">

                <!-- list group item-->
                <div class="card text-bg-light mb-3" id="cardStyle">
                    <li class="list-group-item">

                        <div class="my-2">
                            <div class="row g-0">
                                <div class="col-4">
                                    <a href="{{ route('djs.show', $favourite->id) }}"><img src="/storage/{{$favourite->image}}" class="img-responsive rounded-start img-fluid card-img" alt="dj Image"></a>
                                </div>
                                <div class="col ms-3">
                                    <div class="card-body">

                                        <a href="{{ route('djs.show', $favourite->id) }}">
                                            <h5 class="card-title">{{ $favourite->djname}}</h5>
                                        </a>


                                        <p class="card-text">Home Town: {{ $favourite->town}}</p>
                                        <p class="card-text">Country: {{ $favourite->country }}</p>
                                        <p class="card-text">Genre: {{ $favourite->genre }}</p>
                                        <p class="card-text"><small class="text-muted">Added to Favourites: {{ $favourite->created_at->diffForHumans() }}</small></p>

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