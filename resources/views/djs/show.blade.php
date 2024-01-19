@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('djs.index') }}">All DJs</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $dj->djname }}</li>
        </ol>
    </nav>
</div>

<div class="container mt-3">
    <h1 class="text-center my-5">{{ $dj->name }}</h1>
    <div class="card text-bg-light mb-3">
        <div class="row g-0">
            <div class="col-sm-4">
                <img src="/storage/{{ $dj->image }}" class="img-responsive rounded-start" alt="DJ Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $dj->djname }}</h2>
                    <p class="card-text">{{ $dj->town }}</p>
                    <p class="card-text">{{ $dj->country }}</p>
                    <p class="card-text"><small class="text-body-secondary">dj Added: {{ $dj->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container mt-3">

    <div class="card text-bg-light">
        <h5 class="card-header">Description</h5>
        <div class="card-body">
            <p class="card-text"> {{ $dj->description }}</p>
        </div>
    </div>
</div>



@endsection