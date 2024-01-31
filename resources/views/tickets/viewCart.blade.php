@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/home">Home</a></li>
      <li class="breadcrumb-item"><a href="#" onclick="goBack()">Back</a></li>
      <li class="breadcrumb-item active" aria-current="page">Your cart</li>
    </ol>
  </nav>
</div>

<div class="container mt-3">
  <div class="card text-bg-light mb-3">
    <div class="row g-0">
      <div class="col-sm-4">
        <img src="/storage/{{ $cart->image }}" class="img-responsive rounded-start m-3 img-fluid card-img" alt="Event Image">
      </div>
      <div class="col mt-3 ms-5">
        <div class="card-body">
          <h2 class="card-title">{{ $cart->title }}</h2>
          <p class="card-text">{{ $cart->dj }}</p>
          <p class="card-text">Date: {{ $cart->date }}</p>
          <p class="card-text">Time: {{ $cart->time }}</p>
          <p class="card-text">Price: £{{ $cart->price }}</p>
          <p class="card-text"><small class="text-body-secondary">Ticket Booking Created: {{ $cart->created_at->diffForHumans() }}</small></p>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="container mt-3">
  <div class="card text-bg-light">

    <div class="mt-3 text-center">


      <a href="{{ route('tickets.review') }}" class="btn btn-primary my-3 me-2">Continue to payment</a>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#deleteModal{{ $cart->id }}">
        Cancel Booking
      </button>



    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal{{ $cart->id  }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure you want to cancel this booking?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Deleting is permanent and cannot be undone</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form method="POST" action="{{ route('delete.cart', $cart->id) }}">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Cancel Booking</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection