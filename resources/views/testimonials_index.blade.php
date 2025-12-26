@extends('layouts.app')

@section('title','Testimoni')

@section('content')
<div class="container py-8">
	<h1 class="text-3xl font-bold mb-4">Testimoni</h1>

	<div class="space-y-4">
		@foreach($items as $t)
			<div class="p-4 border rounded">
				<div class="font-semibold">{{ $t->name }}</div>
				<div class="text-sm text-gray-700">{{ $t->message }}</div>
			</div>
		@endforeach
	</div>

	<div class="mt-6">
		<form method="POST" action="{{ route('testimoni.store') }}">
			@csrf
			<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
				<input name="name" placeholder="Nama" class="px-3 py-2 border rounded" required>
				<input name="email" placeholder="Email (opsional)" class="px-3 py-2 border rounded">
			</div>
			<textarea name="message" class="w-full mt-2 border rounded p-2" rows="4" placeholder="Tulis testimoni..." required></textarea>
			<button class="mt-2 px-4 py-2 bg-blue-600 text-white rounded">Kirim Testimoni</button>
		</form>
	</div>
</div>
@endsection
