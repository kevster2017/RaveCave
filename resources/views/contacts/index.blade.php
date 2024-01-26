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
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Message Received</th>
                        <th>Delete Message?</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->username }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message}}</td>
                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                        <td><!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteContactModal{{ $contact->id }}">
                                Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteContactModal{{ $contact->id }}" tabindex="-1" aria-labelledby="deleteContactModalLabel{{ $contact->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteContactModalLabel">Delete {{ $contact->name }}?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Deleting this message is permanent and cannot be undone!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete Message</button>
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