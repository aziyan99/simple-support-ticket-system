@extends('layouts.main')

@section('title', 'User')

@section('breadcump')
    <li class="breadcrumb-item active" aria-current="page">User</li>
@endsection

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <h4>Users</h4>
            <a href="{{ route('user.create') }}" class="btn btn-primary mt-2 mb-2">Create new user</a>
            <div class="table-responsive mt-3 mb-3">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            @if(auth()->user()->id == $user->id)
                                <td class="text-center">
                                    <i>Currently login</i>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('user.edit', $user) }}" class="btn btn-warning d-inline">Edit</a>
                                    <a href="{{ route('user.show', $user) }}" class="btn btn-secondary d-inline">Show</a>
                                    <form action="{{ route('user.destroy', $user) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Delete this user?')"
                                                class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
