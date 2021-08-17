@extends('layouts.auth')

@section('title', 'Regsiter')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4 class="text-center">
                Register
            </h4>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name">Nama lengkap</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}">
                    @error('name') <small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Alamat email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}">
                    @error('email') <small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="password">Kata sandi</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password') <small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="password-confirm">Ulangi kata sandi</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <hr>
                <div class="mb-3">
                    <a href="{{ route('login') }}">Sudah punyak akun? login disini</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
