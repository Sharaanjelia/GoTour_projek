@extends('layouts.app')

@section('title', 'Discounts')

@section('content')
<div class="container py-8">
	<h1 class="text-3xl font-bold mb-4">Promo & Diskon</h1>
	<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
		@foreach($items as $it)
			<div class="p-4 border rounded">
				<div class="font-semibold">{{ $it->code }} — {{ $it->percent }}%</div>
				<div class="text-sm text-gray-600yes">{{ Str::limit($it->description, 120) }}</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
