@extends('layouts.admin')

@section('title','Edit Destinasi')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Destinasi</h2>
    <form method="POST" action="{{ route('admin.destinations.update', $destination) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input name="title" value="{{ old('title', $destination->title) }}" placeholder="Judul" class="w-full mb-2 border p-2 rounded" required>
        <input name="price" value="{{ old('price',$destination->price) }}" placeholder="Harga" class="w-full mb-2 border p-2 rounded">
        <textarea name="excerpt" placeholder="Ringkasan" class="w-full mb-2 border p-2 rounded">{{ old('excerpt', $destination->excerpt) }}</textarea>
        <textarea name="description" placeholder="Deskripsi" class="w-full mb-2 border p-2 rounded">{{ old('description',$destination->description) }}</textarea>
        <input type="file" name="cover_image" class="mb-2">
        <div><label><input type="checkbox" name="is_active" {{ $destination->is_active ? 'checked' : '' }}> Aktif</label></div>
        <button class="mt-2 btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
