@extends('layouts.main')

@section('title', 'Ticket')

@section('breadcump')
    <li class="breadcrumb-item active" aria-current="page">Ticket</li>
@endsection

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <h4>Tickets</h4>
            <a href="{{ route('ticket.create') }}" class="btn btn-primary mt-2 mb-2">Create new ticket</a>
            <div class="table-responsive mt-3 mb-3">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $ticket->status }}</span>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $ticket->category->name }}</span>
                            </td>
                            <td>{{ $ticket->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('ticket.edit', $ticket) }}" class="btn btn-warning d-inline">Edit</a>
                                <a href="{{ route('ticket.show', $ticket) }}" class="btn btn-secondary d-inline">Show</a>
                                <form action="{{ route('ticket.destroy', $ticket) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this ticket?')"
                                            class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
