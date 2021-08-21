@extends('layouts.main')

@section('title', 'Ticket')

@section('breadcump')
    <li class="breadcrumb-item">Ticket</li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Tickets</h4>
            <form action="{{ route('ticket.store') }}" method="POST">
                @csrf

                @include('ticket._form')

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{ route('ticket.index') }}" class="btn btn-secondary mt-2 mb-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
