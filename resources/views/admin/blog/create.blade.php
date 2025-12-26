@extends('layouts.admin')

@section('title','Tambah Post')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Tambah Post</h2>
    <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
        @csrf
        <input name="title" placeholder="Judul" class="w-full mb-2 border p-2 rounded" required>
        <input name="published_at" placeholder="Tanggal terbit (opsional)" class="w-full mb-2 border p-2 rounded">
        <textarea name="excerpt" placeholder="Ringkasan" class="w-full mb-2 border p-2 rounded"></textarea>
        <textarea name="content" placeholder="Konten" class="w-full mb-2 border p-2 rounded"></textarea>
        <input type="file" name="cover_image" class="mb-2">
        <div><label><input type="checkbox" name="is_active"> Aktif</label></div>
        <button class="mt-2 btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
