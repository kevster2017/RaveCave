@extends('layouts.app')

@section('content')


<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/events/show/{{ $cart->eventId }}">Event</a></li>
            <li class="breadcrumb-item"><a href="/tickets/viewCart">View Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ticket Booking Review</li>
        </ol>
    </nav>
</div>

<div class="container text-center my-5">
    <h1>Review Ticket Booking at {{ $cart->title }}</h1>
</div>

<div class="container mt-3">
    <div class="card text-bg-light mb-3" style="max-width: 1080px;">
        <div class="row g-0">
            <div class="col-md-4">


                <img src="/storage/{{ $cart->image }}" class="img-fluid rounded-start img-fluid card-img" alt="Event Image">


            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $cart->title }}</h2>
                    <p class="card-text">{{ $cart->dj }}</p>
                    <p class="card-text">{{ $cart->date }}</p>
                    <p class="card-text">{{ $cart->time }}</p>
                    <p class="card-text">{{ $cart->price }}</p>
                    <p class="card-text"><small class="text-body-secondary">Ticket Booking Created: {{ $cart->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-3">


    <div class="card text-bg-light mt-3">
        <h5 class="card-header" id="divLeft">Ticket Price</h5>
        <div class="card-body">
            <h3 class="text-center"><strong>Final Total: £</strong>{{ $cart->price}}</h3>
        </div>
    </div>


    <div class="card text-bg-light mt-3">
        <h5 class="card-header" id="divLeft">Choose your method of payment</h5>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="stripe" onchange="paymentMethod('Stripe')" checked>
                        <label class="form-check-label" for="stripe">
                            Stripe Payment
                        </label>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="paypal" onchange="paymentMethod('PayPal')">
                        <label class="form-check-label" for="paypal">
                            PayPal
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container text-center">
        <a href="{{ route('tickets.stripe') }}" class="btn btn-primary" id="paymentButton">Book Now</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $cart->id }}" id="cancelBookButton">
            Cancel Ticket
        </button>
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
                        <form method="POST" action="{{ route('delete.ticket', $cart->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Cancel Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    let paymentRadioButtons = document.querySelectorAll('input[name="payment"]');
    let paymentButton = document.getElementById('paymentButton');

    paymentRadioButtons.forEach(function(radioButton) {

        radioButton.addEventListener('change', function() {
            if (radioButton.id === 'stripe' && radioButton.checked) {
                paymentButton.href = "{{ route('tickets.stripe') }}";
            } else if (radioButton.id === 'paypal' && radioButton.checked) {
                paymentButton.href = "{{ route('tickets.paypal') }}";
            }
        })
    });
</script>


@endsection