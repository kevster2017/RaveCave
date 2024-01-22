@extends('layouts.app')

@section('content')
<div class="container-fluid" id="register">
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-body">
                    <h1 class="text-center my-3">EDIT YOUR DJ PROFILE</h1>
                    <form method="POST" action="{{ route('djs.update', $dj->id) }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="djname" placeholder="Enter your DJ name" name="djname" class="form-control @error('djname') is-invalid @enderror" value="{{ $dj->djname }}" required autocomplete="djname" autofocus>
                            <label for="djname">Your DJ Name</label>
                            @error('djname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" value="{{ $dj->image }}" required>
                            <label for="image">DJ Image</label>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="town" placeholder="Enter your town" name="town" class="form-control @error('town') is-invalid @enderror" value="{{ $dj->town }}" required autocomplete="town" autofocus>
                            <label for="town">Home Town</label>
                            @error('town')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="country" placeholder="Enter your Country" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ $dj->country }}" required autocomplete="country" autofocus>
                            <label for="country">Home Country</label>
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="genre" placeholder="Enter your Music Genre" name="genre" class="form-control @error('genre') is-invalid @enderror" value="{{ $dj->genre }}" required autocomplete="genre" autofocus>
                            <label for="genre">Genre</label>
                            @error('genre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter a description" required>{{ $dj->description }}</textarea>
                            <label for="description">Description</label>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="social" placeholder="Enter your Social Media Link" name="social" class="form-control @error('social') is-invalid @enderror" value="{{ $dj->social }}" required autocomplete="social" autofocus>
                            <label for="social">Social Media Link</label>
                            @error('social')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>



                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ $dj->date }}" required autocomplete="date">
                            <label for="date">Date you started DJing</label>
                            @error('date')
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