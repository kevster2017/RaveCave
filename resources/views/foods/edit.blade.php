@extends('layouts.app')

@section('content')

<!--Breadcrumb-->

<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('foods.show', $food->id) }}">My Food Business Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Food Business Profile</li>
        </ol>
    </nav>
</div>

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
                    <h1 class="text-center my-3">EDIT YOUR FOOD BUSINESS PROFILE</h1>
                    <form method="POST" action="{{ route('foods.update', $food->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="businessName" placeholder="Enter your food business name" name="businessName" class="form-control @error('businessName') is-invalid @enderror" value="{{ $food->businessName }}" required autocomplete="businessName" autofocus>
                            <label for="businessName">Your Business Name</label>
                            @error('businessName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1" style="display: flex; align-items: center;">
                            @if($food->image)
                            <img src="{{ asset('storage/' . $food->image) }}" alt="Current Food Business Image" style="max-width: 20%; margin-right: 10px;">
                            @endif

                            <div style="flex-grow: 1;">

                                <label for="image">Business Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            </div>

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="town" placeholder="Enter your town" name="town" class="form-control @error('town') is-invalid @enderror" value="{{ $food->town }}" required autocomplete="town" autofocus>
                            <label for="town">Home Town</label>
                            @error('town')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <select name="type" class="form-select form-select-lg mb-3" aria-label="Food Selection">
                                <option selected>{{ $food->type }}</option>
                                <option value="Burgers">Burgers</option>
                                <option value="Fish and Chips">Fish and Chips</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Indian">Indian</option>
                                <option value="Pizza">Pizza</option>
                            </select>
                            <label for="type">Select Type of food</label>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="form-floating my-3 col-10 offset-1">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter a description" required>{{ $food->description }}</textarea>
                            <label for="description">Description</label>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="webLink" placeholder="Enter your Business Web Link" name="webLink" class="form-control @error('webLink') is-invalid @enderror" value="{{ $food->webLink }}" required autocomplete="webLink" autofocus>
                            <label for="webLink">Business Web Link</label>
                            @error('webLink')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>



                        <div class="row my-3">
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