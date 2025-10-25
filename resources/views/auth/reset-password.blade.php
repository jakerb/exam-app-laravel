@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-title">Reset Password</div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-input @error('email') border-red-500 @enderror" name="email" value="{{ old('email', $request->email) }}" required autocomplete="email" autofocus>

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
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection