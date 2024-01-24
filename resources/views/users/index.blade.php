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

    <h1 class="text-center mb-5">All Users</h1>



    <div class="row">
        <div class="col-sm-8 mx-auto">
            <table class="table table-bordered table-hover">
                <thead class="table table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Town</th>
                        <th>Country</th>
                        <th>Is Admin</th>
                        <th>Account Created</th>
                        <th>Delete User?</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if( $user->image == 'images/profileImage.jpg')
                            <img src="images/profileImage.jpg" alt="User Image" width="50">
                            @else
                            <img src="/storage/{{ $user->image }}" alt="User Image" width="50">
                            @endif
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->town }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->isAdmin }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td><!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}">
                                Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteUserModalLabel">Delete {{ $user->name }}?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Deleting this user is permanent and cannot be undone!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete User</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection