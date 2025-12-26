@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
<div class="container py-8">
	<h1 class="text-3xl font-bold mb-4">Layanan Kami</h1>
	<div class="space-y-4">
		@foreach($services as $s)
			<div class="p-4 border rounded">
				<div class="text-lg font-semibold">{{ $s->name }}</div>
				<div class="text-sm text-gray-600">{{ Str::limit($s->description, 120) }}</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
