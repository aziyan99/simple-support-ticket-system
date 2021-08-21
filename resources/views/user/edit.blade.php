@extends('layouts.main')

@section('title', 'User')

@section('breadcump')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Edit user form</h4>
            <hr>
            <form action="{{ route('user.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                @include('user._form')

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary mt-2 mb-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
