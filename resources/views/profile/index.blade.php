@extends('layouts.main')

@section('title', 'Profile')

@section('breadcump')
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
@endsection

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <h4>Profile</h4>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mt-2 mb-2">Update information</h5>
                    <form action="{{ route('profile.update.data', auth()->user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', auth()->user()->name) }}">
                            @error('email')
                            <small class="invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', auth()->user()->email) }}">
                            @error('email')
                            <small class="invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Update profile</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h5 class="mt-2 mb-2">Update password</h5>
                    <form action="{{ route('profile.update.password', auth()->user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <small class="invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Password confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control @error('password_confirmation') is-invalid @enderror">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-danger" type="submit">Update password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
