@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="#">All Events</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </nav>
</div>

<div class="container mt-3">
    <h1 class="text-center my-5">Welcome to {{ $event->title }}</h1>
</div>

<div class="container-fluid">
    <img src="">
</div>





@endsection