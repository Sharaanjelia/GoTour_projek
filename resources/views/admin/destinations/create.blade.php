@extends('layouts.admin')

@section('title','Tambah Destinasi')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Tambah Destinasi</h2>
    <form method="POST" action="{{ route('admin.destinations.store') }}" enctype="multipart/form-data">
        @csrf
        <input name="title" placeholder="Judul" class="w-full mb-2 border p-2 rounded" required>
        <input name="price" placeholder="Harga" class="w-full mb-2 border p-2 rounded">
        <textarea name="excerpt" placeholder="Ringkasan" class="w-full mb-2 border p-2 rounded"></textarea>
        <textarea name="description" placeholder="Deskripsi" class="w-full mb-2 border p-2 rounded"></textarea>
        <input type="file" name="cover_image" class="mb-2">
        <div><label><input type="checkbox" name="is_active"> Aktif</label></div>
        <button class="mt-2 btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
