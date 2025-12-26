@extends('layouts.admin')

@section('title','Tambah Foto')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Tambah Foto</h2>
    <form method="POST" action="{{ route('admin.photos.store') }}" enctype="multipart/form-data">
        @csrf
        <input name="title" placeholder="Judul" class="w-full mb-2 border p-2 rounded" required>
        <input type="file" name="image" class="mb-2">
        <textarea name="description" placeholder="Deskripsi" class="w-full mb-2 border p-2 rounded"></textarea>
        <button class="mt-2 btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
