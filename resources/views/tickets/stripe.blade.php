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
                     <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="userID" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="username" value="{{ Auth::user()->username }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                        <div class="form-floating my-3 col-10 offset-1">
                           <input type="text" class="form-control" id="subject" placeholder="Enter subject of your message" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" required autocomplete="subject" autofocus>
                           <label for="subject">Message Subject</label>
                           @error('subject')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror

                        </div>



                        <div class="form-floating my-3 col-10 offset-1">
                           <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="100" placeholder="Enter a message" required>{{ old('message') }}</textarea>
                           <label for="description">Message</label>
                           @error('message')
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
   </div>


</div>


<div class="container">
   <div class="row">
      <h3 style="text-align: center;margin-top: 40px;margin-bottom: 40px;">Payment Page</h3>
      <div class="col-md-6 col-md-offset-3">
         <div class="panel panel-default credit-card-box">
            <div class="panel-heading">
               <div class="row">
                  <h3>Payment By Card</h3>

               </div>
            </div>
            <div class="panel-body">
               @if (Session::has('success'))
               <div class="alert alert-success text-center">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                  <p>{{ Session::get('success') }}</p><br>
               </div>
               @endif
               <br>
               <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                  @csrf
                  <div class='form-row row'>
                     <div class='col-xs-12 col-md-6 form-group required'>
                        <label class='control-label'>Name on Card</label>
                        <input class='form-control' size='4' type='text'>
                     </div>
                     <div class='col-xs-12 col-md-6 form-group required'>
                        <label class='control-label'>Card Number</label>
                        <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                     </div>
                  </div>
                  <div class='form-row row mt-3'>
                     <div class='col-xs-12 col-md-4 form-group cvc required'>
                        <label class='control-label'>CVC</label>
                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                     </div>
                     <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Month</label>
                        <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                     </div>
                     <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Year</label>
                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                     </div>
                  </div>
                  {{-- <div class='form-row row'>
                         <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try
                               again.
                            </div>
                         </div>
                      </div> --}}
                  <div class="form-row row">
                     <div class="col-xs-12 mt-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                     </div>
                  </div>
               </form> <!-- End Pay by Card Form -->
            </div>

         </div>
      </div>
   </div>
</div>

@endsection