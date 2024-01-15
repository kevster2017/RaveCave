@extends('layouts.app')

@section('content')
<div class="container-fluid" id="login">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">

                <div class="card-body">
                    <h1 class="text-center my-3">Log in to The Rave Cave</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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


                        <div class="col offset-5 mb-5">
                            <div class="form-check">
                                <label class="form-check-label" for="remember">Remember me</label>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    <div class="text-center mt-5">
                        <p>No Account? Click <a href="{{ route('register') }}">here</a> to register</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection