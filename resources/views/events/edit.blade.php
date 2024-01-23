@extends('layouts.app')

@section('content')

<!--Breadcrumb-->

<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.show', $event->id) }}">My Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Event Details</li>
        </ol>
    </nav>
</div>

@if(count($errors) > 0 )
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

    </button>
    <ul class="p-0 m-0" style="list-style: none;">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container-fluid" id="register">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-body">
                    <h1 class="text-center my-3">EDIT AN EVENT</h1>
                    <form method="POST" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="userID" value="{{ Auth::user()->id }}">


                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="title" placeholder="Enter event title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $event->title }}" required autocomplete="title" autofocus>
                            <label for="title">Event Title</label>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input id="dj" type="text" class="form-control @error('dj') is-invalid @enderror" name="dj" value="{{ $event->dj }}" placeholder="Enter DJ Name" required autocomplete="dj">
                            <label for="dj">DJ Name</label>
                            @error('dj')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1" style="display: flex; align-items: center;">
                            @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" alt="Current Event Image" style="max-width: 20%; margin-right: 10px;">
                            @endif

                            <div style="flex-grow: 1;">

                                <label for="image">Event Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            </div>

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1" style="display: flex; align-items: center;">
                            <div>
                                @if($event->video)
                                <video controls style="max-width: 20%; margin-right: 10px;">
                                    <source src="{{ asset('uploads/' . $event->video) }}" type="video/*">
                                    Your browser does not support the video tag.
                                </video>
                                @endif
                            </div>

                            <div style="flex-grow: 1;">
                                <label for="video">Event Video</label>
                                <input type="file" class="form-control @error('video') is-invalid @enderror" id="video" name="video" accept="video/*">
                            </div>

                            @error('video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ $event->date }}" required autocomplete="date">
                            <label for="date">Date</label>
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ $event->time }}" required autocomplete="time">
                            <label for="time">Time</label>
                            @error('time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="number" class="form-control" id="price" placeholder="Enter event price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $event->price }}" required autocomplete="price" autofocus>
                            <label for="price">Event Price</label>
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter a description" required>{{ $event->description }}</textarea>
                            <label for="description">Description</label>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row my-5">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection