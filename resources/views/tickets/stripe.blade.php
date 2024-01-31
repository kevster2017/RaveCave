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

                        <div class="form-floating my-3 col-10 offset-1">
                           <input type="text" class="form-control" id="name" placeholder="Enter name on card" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                           <label for="name" class='control-label'>Name on Card</label>
                           @error('name')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror

                        </div>

                        <div class="form-floating my-3 col-10 offset-1">
                           <input type="text" class="form-control" id="cardNum" placeholder="Enter 16 digit card number" name="cardNum" class="form-control @error('cardNum') is-invalid @enderror" value="{{ old('cardNum') }}" required autocomplete="cardNum" autofocus>
                           <label for="cardNum" class='control-label'>16 Digit Card Number</label>
                           @error('cardNum')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror

                        </div>


                        <div class="form-floating my-3 col-4 offset-1">
                           <input type="text" class="form-control" id="startDate" placeholder="Start mm/yy" name="startDate" class="form-control @error('startDate') is-invalid @enderror" value="{{ old('startDate') }}" required autocomplete="startDate" autofocus>
                           <label for="startDate" class='control-label'>Expiry Month 12</label>
                           @error('startDate')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror

                        </div>

                        <div class="form-floating my-3 col-4 offset-1">
                           <input type="text" class="form-control" id="endDate" placeholder="End mm/yy" name="endDate" class="form-control @error('endDate') is-invalid @enderror" value="{{ old('endDate') }}" required autocomplete="endDate" autofocus>
                           <label for="endDate" class='control-label'>Expiry Year 2028</label>
                           @error('endDate')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror

                        </div>



                        <div class="form-floating my-3 col-3 offset-1">
                           <input type="text" class="form-control" id="cvc" placeholder="cvc" name="cvc" class="form-control @error('cvc') is-invalid @enderror" value="{{ old('cvc') }}" required autocomplete="cvc" autofocus>
                           <label for="cvc" class='control-label'>CVC 123</label>
                           @error('cvc')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror

                        </div>





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