@extends('layouts.frontend.app')

@section('content')
<div class="register-photo">
    <div class="form-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h2 class="text-center">
            <strong> Hi, Silahkan Masuk!</strong>
            </h2>
            <h2 class="mb-3"><strong>Halaman Login</strong></h2>
            <div class="form-group">
                <input id="username" placeholder="Username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember" style="padding-top: 0.1rem;">Ingat saya</label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">
                    {{ __('Login') }}
                </button>
            </div><hr>
            <center><a href=#" target="_blank" >Copyright &copy; 2025 Kenni Pratiwi</a></center>
        </form>
        <div class="image-holder"></div>
    </div>
</div>	
@endsection
