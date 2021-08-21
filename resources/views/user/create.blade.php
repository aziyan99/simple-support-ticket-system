@extends('layouts.main')

@section('title', 'User')

@section('breadcump')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Create user form</h4>
            <hr>
            <div class="alert alert-info">
                Password will be automatically generate same with the registered email
            </div>
            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                @include('user._form')

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary mt-2 mb-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
