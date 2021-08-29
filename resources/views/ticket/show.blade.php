@extends('layouts.main')

@section('title', 'Ticket')

@section('breadcump')
<li class="breadcrumb-item">Ticket</li>
<li class="breadcrumb-item active" aria-current="page">Show</li>
@endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">{{ session('success') }}</div>
@endif
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
                <hr>
                <h5>Update ticket status</h5>
                <form action="{{ route('ticket.update.status', $ticket) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="pending" {{ $ticket->status == "pending" ? "selected" : "" }}>pending
                            </option>
                            <option value="process" {{ $ticket->status == "process" ? "selected" : "" }}>process
                            </option>
                            <option value="done" {{ $ticket->status == "done" ? "selected" : "" }}>done</option>
                        </select>
                        @error('status')
                        <small class="invalid-feedback" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <Button type="submit" class="btn btn-primary">Save</Button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3 mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>Ticket #{{ $ticket->id }}</h4>
                <hr>
                @foreach ($comments as $comment)
                <div class="message-container mb-3">
                    <div class="bg-success bg-opacity-50">
                        <p class="ms-2">Posted by <b>{{ $comment->writer->name }}</b> - {{ $comment->created_at->diffForHumans() }} </p>
                    </div>
                    <p>
                        {!! $comment->content !!}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('ticket.store.message', $ticket) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label id="content">Message</label>
                        <input id="x" type="hidden" name="content">
                        <trix-editor input="x"></trix-editor>
                        {{-- <textarea name="content" id="content" cols="30" rows="10"
                        class="form-control @error('content') is-invalid @enderror"></textarea> --}}
                        @error('content')
                            <small class="invalid-feedback" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
