@extends('layouts.main')

@section('title', 'Ticket')

@section('breadcump')
    <li class="breadcrumb-item">Ticket</li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Ticket detail</h4>
            <hr>
            <a href="{{ route('ticket.index') }}" class="btn btn-secondary mt-2 mb-2">Back</a>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Customer</th>
                            <td>{{ $ticket->customer->name }}</td>
                        </tr>
                        <tr>
                            <th>Agent</th>
                            <td>{{ $ticket->agent->name }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td><span class="badge bg-secondary">{{ $ticket->category->name }}</span></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><span class="badge bg-secondary">{{ $ticket->status }}</span></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Subject</th>
                            <td>{{ $ticket->subject }}</td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td>{{ $ticket->content }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
