
@extends('layouts.guest')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth-custom.css') }}">
@endsection

@section('content')
<div class="auth-card">
    @include('components.auth-logo')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label for="name">Nama</label>
        <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
        <x-input-error :messages="$errors->get('name')" class="mt-2" />

        <label for="email">Email</label>
        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <label for="password_confirmation">Konfirmasi Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        <button type="submit" class="auth-btn">Daftar</button>
    </form>
    <div style="text-align:center; margin-top:1.2rem;">
        <span>Sudah punya akun? <a class="auth-link" href="{{ route('login') }}">Masuk</a></span>
    </div>
</div>
@endsection
