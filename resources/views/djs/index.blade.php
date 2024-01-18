@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All DJs</li>
        </ol>
    </nav>
</div>

<div class="container py-3">

    <h1 class="text-center">All DJs</h1>


    @foreach($djs as $dj)
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
                                    <a href="{{ route('djs.show', $dj->id) }}"><img src="/storage/{{$dj->image}}" class="img-responsive rounded-start img-fluid card-DJimg" alt="dj Image"></a>
                                </div>
                                <div class="col ms-3">
                                    <div class="card-body">

                                        <a href="{{ route('djs.show', $dj->id) }}">
                                            <h5 class="card-title">{{ $dj->djname}}</h5>
                                        </a>


                                        <p class="card-text">Home Town: {{ $dj->town}}</p>
                                        <p class="card-text">Country: {{ $dj->country }}</p>
                                        <p class="card-text">Genre: {{ $dj->genre }}</p>
                                        <p class="card-text"><small class="text-muted">Joined The Rave Cave: {{ $dj->created_at->diffForHumans() }}</small></p>

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