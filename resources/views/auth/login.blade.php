
@extends('layouts.guest')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth-custom.css') }}">
@endsection

@section('content')
<div class="auth-card">
    @include('components.auth-logo')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email">Email</label>
        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 0.5rem;">
            <label for="remember_me" style="display: flex; align-items: center;">
                <input id="remember_me" type="checkbox" name="remember" style="margin-right: 0.4rem;">
                <span>Ingat saya</span>
            </label>
            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>
        <button type="submit" class="auth-btn">Masuk</button>
    </form>
    <div style="text-align:center; margin-top:1.2rem;">
        <span>Belum punya akun? <a class="auth-link" href="{{ route('register') }}">Daftar</a></span>
    </div>
</div>
@endsection
