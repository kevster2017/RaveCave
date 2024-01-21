@extends('layouts.app')

@section('content')

<!--Breadcrumb-->

<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.show', auth()->user()->id) }}">My Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User Details</li>
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
                    <h1 class="text-center my-3">EDIT YOUR PROFILE</h1>
                    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            <label for="name">Name</label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                            <label for="image">Your Image</label>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="Enter email" required autocomplete="email">
                            <label for="email">Email Address</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>



                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control @error('town') is-invalid @enderror" id="town" placeholder="Enter town" name="town" value="{{ $user->town }}" required autocomplete="town">
                            <label for="town">Town</label>
                            @error('town')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control @error('town') is-invalid @enderror" id="country" placeholder="Enter country" name="country" value="{{ $user->country }}" required autocomplete="country">
                            <label for="country">Country</label>
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control @error('town') is-invalid @enderror" id="username" placeholder="Enter a username" name="username" value="{{ $user->username }}" required autocomplete="username">
                            <label for="username">Username</label>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control @error('town') is-invalid @enderror" id="isAdmin" name="isAdmin" value="{{ $user->isAdmin}}" required autocomplete="isAdmin">
                            <label for="isAdmin">isAdmin</label>
                            @error('isAdmin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="row my-5">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Profile') }}
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