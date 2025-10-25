@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-title">Reset Password</div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-input @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>

            <div class="text-center mt-4">
                <a class="btn-link text-sm" href="{{ route('login') }}">
                    {{ __('Back to Login') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection