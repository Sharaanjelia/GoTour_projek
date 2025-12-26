@extends('layouts.admin')

@section('title','Edit Foto')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Foto</h2>
    <form method="POST" action="{{ route('admin.photos.update', $photo) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input name="title" value="{{ old('title', $photo->title) }}" placeholder="Judul" class="w-full mb-2 border p-2 rounded" required>
        <input type="file" name="image" class="mb-2">
        <textarea name="description" placeholder="Deskripsi" class="w-full mb-2 border p-2 rounded">{{ old('description',$photo->description) }}</textarea>
        <button class="mt-2 btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
