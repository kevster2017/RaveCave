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
        <div class="col-12 col-md-4">
            <div class="card text-bg-light">
                <h5 class="card-header">Follow {{ $dj->djname }}</h5>
                <div class="card-body">
                    <div class="row justify-content-between ms-3">
                        <div class="col">
                            @if(auth()->check() && $dj->favouritedBy->contains(auth()->user()))
                            <form action="{{ route('djs.unfavourite', $dj->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Remove from Favourites</button>
                            </form>
                            @else
                            <form action="{{ route('djs.favourite', $dj->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="dj_id" value="{{ $dj->id }}">

                                <button type="submit" class="btn btn-primary">Add to Favourites</button>
                            </form>
                            @endif
                        </div>
                        <div class="col">
                            @if( $dj->user_id == auth()->user()->id)

                            <a class="btn btn-danger" href="{{ route('djs.edit', $dj->id) }}">Edit Profile</a>

                            @endif
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
                        <p class="card-text"><strong>Description:</strong> {{ $dj->description}}</p>
                        <p class="card-text"><strong>Social Media:</strong> {{ $dj->social }}</p>
                        <p class="card-text"><strong>Began DJ Career:</strong> {{ date('d/m/Y', strtotime($dj->date)) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Rate {{ $dj->name }}
        </div>
        <div class="card-body">
            <form id="ratingForm" action="{{ route('rateDj') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="dj_id" value="{{ $dj->id }}">
                <input type="hidden" name="name" value="{{ Auth::user()->username }}">
                <input type="hidden" name="image" value="{{ Auth::user()->image }}">


                <div class="row">
                    <div class="col-4">
                        <div class="star-rating">
                            <h5 class="card-title text-center">DJ Rating</h5>
                            <input type="radio" id="star5" name="stars" value="5" />
                            <label for="star5" title="5 stars">&#9733;</label>
                            <input type="radio" id="star4" name="stars" value="4" />
                            <label for="star4" title="4 stars">&#9733;</label>
                            <input type="radio" id="star3" name="stars" value="3" />
                            <label for="star3" title="3 stars">&#9733;</label>
                            <input type="radio" id="star2" name="stars" value="2" />
                            <label for="star2" title="2 stars">&#9733;</label>
                            <input type="radio" id="star1" name="stars" value="1" />
                            <label for="star1" title="1 star">&#9733;</label>
                        </div>
                    </div>
                    <div class="col-8">
                        <textarea class="form-control @error('comment') is-invalid @enderror mt-3" id="comment" name="comment" rows="3" placeholder="Enter a comment" required>{{ old('comment') }}</textarea>
                        @error('comment')
                        <label for="comment">Enter your comment</label>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn btn-primary mt-3">Submit Rating</button>
                    </div>
                </div>
            </form>


        </div>
    </div>


</div>



@endsection