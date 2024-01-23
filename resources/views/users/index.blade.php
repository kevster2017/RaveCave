@extends('layouts/app')

@section('content')
<!-- Page Content -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Users</li>
        </ol>
    </nav>
</div>

<div class="container py-3">

    <h1 class="text-center">All Users</h1>


    @foreach($users as $user)
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Town</th>
                        <th>Country</th>
                        <th>Is Admin</th>
                        <th>Account Created</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td><img src="{{ $user->image }}" alt="User Image" width="50"></td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->town }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->isAdmin }}</td>
                        <td>{{ $user->created_at->diffForHumans }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <br>
    @endforeach
</div>
@endsection