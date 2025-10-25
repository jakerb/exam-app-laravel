@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-title">Register</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-input @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-input @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-input @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>

            <div class="text-center mt-4">
                <span class="text-sm text-gray-600">Already have an account?</span>
                <a class="btn-link text-sm ml-1" href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection