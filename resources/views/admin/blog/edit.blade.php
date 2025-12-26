@extends('layouts.admin')

@section('title','Edit Post')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Post</h2>
    <form method="POST" action="{{ route('admin.blog.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input name="title" value="{{ old('title', $post->title) }}" placeholder="Judul" class="w-full mb-2 border p-2 rounded" required>
        <input name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d')) }}" placeholder="Tanggal terbit (opsional)" class="w-full mb-2 border p-2 rounded">
        <textarea name="excerpt" placeholder="Ringkasan" class="w-full mb-2 border p-2 rounded">{{ old('excerpt', $post->excerpt) }}</textarea>
        <textarea name="content" placeholder="Konten" class="w-full mb-2 border p-2 rounded">{{ old('content', $post->content) }}</textarea>
        <input type="file" name="cover_image" class="mb-2">
        <div><label><input type="checkbox" name="is_active" {{ $post->is_active ? 'checked' : '' }}> Aktif</label></div>
        <button class="mt-2 btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
