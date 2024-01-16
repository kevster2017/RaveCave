@extends('layouts.app')

@section('content')
<div class="container-fluid" id="register">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-body">
                    <h1 class="text-center my-3">CREATE AN ACCOUNT</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <input type="hidden" name="isAdmin" value="0">

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="name">Name</label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email" required autocomplete="email">
                            <label for="email">Email Address</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>



                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control @error('town') is-invalid @enderror" id="town" placeholder="Enter town" name="town" value="{{ old('town') }}" required autocomplete="town">
                            <label for="town">Town</label>
                            @error('town')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control @error('town') is-invalid @enderror" id="country" placeholder="Enter country" name="country" value="{{ old('country') }}" required autocomplete="country">
                            <label for="country">Country</label>
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input type="text" class="form-control @error('town') is-invalid @enderror" id="username" placeholder="Enter a username" name="username" value="{{ old('username') }}" required autocomplete="username">
                            <label for="username">Username</label>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <label for="password">Password</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <label for="email">Confirm Password</label>
                        </div>


                        <div class="row my-5">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col text-center">
                                <p>Already with us? Click <a href="{{ route('login') }}">here</a> to log in</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection