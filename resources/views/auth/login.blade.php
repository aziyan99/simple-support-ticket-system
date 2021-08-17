@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <h4 class="text-center">
                    Login
                </h4>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
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
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Ingat Saya
                        </label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <hr>
                    <div class="mb-3">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                Lupa kata sandi?
                            </a>
                            <br>
                            <a href="{{ route('register') }}">Belum punyak akun? register disini</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
