@extends('layouts.admin')

@section('title','Tambah Service')

@section('content')
<div class="service-form-card">
    <h2>Tambah Service</h2>
    <form method="POST" action="{{ route('admin.services.store') }}">
        @csrf
        <label for="name">Nama Layanan</label>
        <input name="name" id="name" placeholder="Nama layanan" type="text" required>
        <label for="description">Deskripsi</label>
        <textarea name="description" id="description" placeholder="Deskripsi"></textarea>
        <label for="price">Harga</label>
        <input name="price" id="price" placeholder="Harga" type="number">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
