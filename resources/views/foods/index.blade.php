@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Food Businesses</li>
        </ol>
    </nav>
</div>

<div class="container py-3">

    <h1 class="text-center">All Food Businesses</h1>


    @foreach($foods as $food)
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
                                    <a href="{{ route('foods.show', $food->id) }}"><img src="/storage/{{$food->image}}" class="img-responsive rounded-start img-fluid card-img" alt="Food Image"></a>
                                </div>
                                <div class="col ms-3">
                                    <div class="card-body">

                                        <a href="{{ route('foods.show', $food->id) }}">
                                            <h5 class="card-title">{{ $food->businessName}}</h5>
                                        </a>


                                        <p class="card-text">Town: {{ $food->town}}</p>

                                        <p class="card-text">Food Type: {{ $food->type }}</p>
                                        <p class="card-text"><small class="text-muted">Joined The Rave Cave: {{ $food->created_at->diffForHumans() }}</small></p>

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