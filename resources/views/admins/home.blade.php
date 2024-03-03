@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="row row-cols-1 row-cols-md-3 g-4">


            @if(auth()->user()->isAdmin == 1)


            <div class="col">
                <div class="card custom-card h-100">
                    <a href=" {{ route('users.index') }}"><img src="/images/allUsers.jpg" class="card-img-top img-fluid" alt="Ravers dancing"></a>
                    <div class="card-body">
                        <h5 class="card-title">View All Users</h5>
                        <p class="card-text">View the list of registered users</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card custom-card h-100">
                    <a href=" {{ route('contacts.index') }}"><img src="/images/allUsers.jpg" class="card-img-top img-fluid" alt="Ravers dancing"></a>
                    <div class="card-body">
                        <h5 class="card-title">View All Messages</h5>
                        <p class="card-text">View all messages received</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card custom-card h-100">
                    <a href=" {{ route('rateDjs.index') }}"><img src="/images/allUsers.jpg" class="card-img-top img-fluid" alt="Ravers dancing"></a>
                    <div class="card-body">
                        <h5 class="card-title">View All DJ Ratings</h5>
                        <p class="card-text">View all DJ ratings received</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card custom-card h-100">
                    <a href=" {{ route('rateEvents.index') }}"><img src="/images/allUsers.jpg" class="card-img-top img-fluid" alt="Ravers dancing"></a>
                    <div class="card-body">
                        <h5 class="card-title">View All Event Ratings</h5>
                        <p class="card-text">View all event ratings received</p>
                    </div>
                </div>
            </div>


            @endif


        </div>
    </div>
</div>
@endsection