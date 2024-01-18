@extends('layouts.app')

@section('content')
<div class="container-fluid" id="register">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-body">
                    <h1 class="text-center my-3">CREATE YOUR DJ PROFILE</h1>
                    <form method="POST" action="{{ route('djs.store') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="userID" value="{{ Auth::user()->id }}">


                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="title" placeholder="Enter event title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required autocomplete="title" autofocus>
                            <label for="title">Event Title</label>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input id="dj" type="text" class="form-control @error('dj') is-invalid @enderror" name="dj" value="{{ old('dj') }}" placeholder="Enter DJ Name" required autocomplete="dj">
                            <label for="dj">DJ Name</label>
                            @error('dj')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                            <label for="image">Image</label>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="file" class="form-control @error('video') is-invalid @enderror" id="video" name="video" accept="video/*" required>
                            <label for="video">Video</label>
                            @error('video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required autocomplete="date">
                            <label for="date">Date</label>
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ old('time') }}" required autocomplete="time">
                            <label for="time">Time</label>
                            @error('time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter a description" required>{{ old('description') }}</textarea>
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