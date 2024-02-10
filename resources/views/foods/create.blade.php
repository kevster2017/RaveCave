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
                    <h1 class="text-center my-3">CREATE YOUR FOOD PROFILE</h1>
                    <form method="POST" action="{{ route('foods.store') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="businessname" placeholder="Enter your Business name" name="businessname" class="form-control @error('businessname') is-invalid @enderror" value="{{ old('businessname') }}" required autocomplete="businessname" autofocus>
                            <label for="businessname">Your Business Name</label>
                            @error('businessname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                            <label for="image">Business Image</label>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="town" placeholder="Enter your town" name="town" class="form-control @error('town') is-invalid @enderror" value="{{ old('town') }}" required autocomplete="town" autofocus>
                            <label for="town">Town</label>
                            @error('town')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <select class="form-select form-select-lg mb-3" aria-label="Large select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="type">Type of food</label>
                            @error('type')
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

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="webLink" placeholder="Enter your Business Web Link" name="webLink" class="form-control @error('webLink') is-invalid @enderror" value="{{ old('webLink') }}" required autocomplete="webLink" autofocus>
                            <label for="webLink">Business Web Link</label>
                            @error('webLink')
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