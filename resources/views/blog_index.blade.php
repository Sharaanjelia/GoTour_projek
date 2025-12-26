@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<div class="container py-8">
	<h1 class="text-3xl font-bold mb-4">Blog</h1>
	<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
		@foreach($posts as $post)
			<article class="card p-4 shadow-sm">
				<h2 class="text-xl font-semibold">{{ $post->title }}</h2>
				<div class="text-sm text-gray-600">{{ $post->excerpt }}</div>
			</article>
		@endforeach
	</div>
	<div class="mt-6">{{ $posts->links() }}</div>
</div>
@endsection
