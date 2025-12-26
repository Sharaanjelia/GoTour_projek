@extends('layouts.app')

@section('title', $package->title)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/packages.css') }}">
@endpush

@section('content')
<section class="container2 my-8">
	<div class="bg-white p-6 rounded shadow-sm grid lg:grid-cols-3 gap-6 items-start">
		<div class="col-span-2">
			<div class="tour-cover" style="height:360px; border-radius:12px; overflow:hidden;">
				<img src="{{ $package->cover_image ? asset('storage/packages/'.$package->cover_image) : 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1200&q=80' }}" alt="{{ $package->title }}" style="width:100%; max-height:400px; object-fit:cover;">
			</div>

			<div class="mt-4">
				<h1 class="text-3xl font-bold">{{ $package->title }}</h1>
				<p class="text-sm text-gray-600 mt-2">{{ $package->duration }} • Rp {{ number_format($package->price ?? 0, 0, ',', '.') }}</p>
			</div>

			<div class="mt-4 leading-relaxed text-gray-700">
				{!! nl2br(e($package->description)) !!}
			</div>
		</div>

		<aside class="p-4 bg-gray-50 rounded-lg">
			<div class="font-semibold mb-2">Ringkasan</div>
			<div class="text-sm text-gray-700 mb-4">{{ Str::limit($package->excerpt ?: strip_tags($package->description), 200) }}</div>
			<div class="mb-3"><strong>Durasi:</strong> {{ $package->duration }}</div>
			<div class="mb-3"><strong>Harga:</strong> <span class="text-orange-600 font-bold">Rp {{ number_format($package->price ?? 0,0,',','.') }}</span></div>
			<br>
			<br>
			@auth
			<form method="POST" action="{{ route('payments.store') }}">
				@csrf
				<input type="hidden" name="package_id" value="{{ $package->id }}">
				<input type="hidden" name="amount" value="{{ $package->price }}">
				<input type="hidden" name="payment_method" value="manual">
				<button class="cta-btn block text-center">Pesan Sekarang</button>
			</form>
			@else
			<a href="{{ route('login') }}" class="cta-btn block text-center">Login untuk Pesan</a>
			@endauth
		</aside>
	</div>

	<div class="mt-6">
		<a href="{{ route('paket.index') }}" class="text-gray-600 hover:underline">← Kembali ke semua paket</a>
	</div>
</section>
@endsection
