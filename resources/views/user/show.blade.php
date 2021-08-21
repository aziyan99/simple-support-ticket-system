@extends('layouts.main')

@section('title', 'User')

@section('breadcump')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>User detail</h4>
            <hr>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>{{ $user->role }}</td>
                </tr>
            </table>
            <a href="{{ route('user.index') }}" class="mt-3 mb-3 btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
