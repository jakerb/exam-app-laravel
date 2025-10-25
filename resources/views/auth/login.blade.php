@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="flex justify-center mb-4">
            <x-logo :width="200"></x-logo>
        </div>
        <div class="auth-title">Login</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-input @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-input @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember Me') }}</span>
                </label>
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>

            <div class="text-center mt-4">
                @if (Route::has('password.request'))
                    <a class="btn-link text-sm" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>

            <div class="text-center mt-4">
                <span class="text-sm text-gray-600">Don't have an account?</span>
                <a class="btn-link text-sm ml-1" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection