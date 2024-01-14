@extends('layouts.app')

@section('content')
<div class="container-fluid" id="welcome">
    <div class="row">
        <div class="col">
            <div class="welcomeText">
                <h1 class="mt-5">Welcome to The Rave Cave</h1>
                <h2 class="mt-5">The site that allows you to enjoy an online festival from the comfort of your home</h2>
                <a href="{{ route('register') }}" class="btn btn-lg btn-success mt-5">Join us</a>
            </div>
        </div>
        <div class="col">

        </div>
    </div>


</div>



@endsection