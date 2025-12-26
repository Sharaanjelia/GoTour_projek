@extends('layouts.app')

@section('title', 'Destinasi')

@section('content')
<div class="container py-8">
	<h1 class="text-3xl font-bold mb-4">Destinasi Populer</h1>
	<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
		@foreach($destinations as $d)
			<div class="card p-4 shadow-sm">
				<h3 class="text-lg font-semibold">{{ $d->title }}</h3>
				<div class="text-sm text-gray-600">{{ Str::limit($d->excerpt ?: $d->description, 80) }}</div>
			</div>
		@endforeach
	</div>
	<div class="mt-6">{{ $destinations->links() }}</div>
</div>
@endsection
