@extends('layouts.app')
@section("content")

<!-- Page Content -->
<div class="container mt-3">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/home">Home</a></li>
         <li class="breadcrumb-item" aria-current="page"><a href="#">Buy Tickets</a></li>
         <li class=" breadcrumb-item active" aria-current="page">Payment Page</li>
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
            <div class="row">
               <div class="col-4 ">
                  <img src="/images/cardPayment.jpg" class="img-fluid rounded-start h-100" alt="Card Payment Image">
               </div>

               <div class="col-8">
                  <div class="card-body">
                     <h1 class="text-center my-3">Pay By Card</h1>
                     <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
                        @csrf
                        <div class='form-row row'>
                           <div class='form-floating col-xs-12 col-md-6 form-group required'>
                              <input class='form-control' size='4' type='text' autofocus placeholder="Name on card">
                              <label class='control-label ms-2'>Name on Card</label>

                           </div>
                           <div class='form-floating col-xs-12 col-md-6 form-group required'>
                              <input autocomplete='off' class='form-control card-number' size='20' type='text' placeholder="Enter 16 digit card number">
                              <label class='control-label ms-2'>Card Number</label>

                           </div>
                        </div>

                        <div class='form-row row mt-3'>
                           <div class='form-floating col-xs-12 col-md-4 form-group cvc required'>
                              <input autocomplete='off' class='form-control card-cvc' placeholder='CVC' size='4' type='text'>
                              <label class='control-label ms-2'>CVC</label>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <input class='form-floating form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                              <label class='control-label ms-2'>Expiration Month</label>

                           </div>
                           <div class='form-floating col-xs-12 col-md-4 form-group expiration required'>
                              <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                              <label class='control-label ms-2'>Expiration Year</label>

                           </div>
                        </div>


                        {{-- <div class='form-row row'>
                         <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try
                               again.
                            </div>
                         </div>
                      </div> --}}










                        <div class="row my-5">
                           <div class="col text-center">
                              <button type="submit" class="btn btn-primary">
                                 {{ __('Pay Now') }}
                              </button>
                           </div>
                        </div>

                     </form>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>


</div>


@endsection