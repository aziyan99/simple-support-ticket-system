@extends('layouts.main')

@section('title', 'Ticket')

@section('breadcump')
    <li class="breadcrumb-item">Ticket</li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Edit ticket form</h4>
            <form action="{{ route('ticket.update', $ticket) }}" method="POST">
                @csrf
                @method('PUT')

                @include('ticket._form')

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="{{ route('ticket.index') }}" class="btn btn-secondary mt-2 mb-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
