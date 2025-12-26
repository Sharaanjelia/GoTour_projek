@extends('layouts.admin')

@section('title','Edit Service')

@section('content')
<div class="service-form-card">
    <h2>Edit Service</h2>
    <form method="POST" action="{{ route('admin.services.update', $service) }}">
        @csrf
        @method('PUT')
        <label for="name">Nama Layanan</label>
        <input name="name" id="name" value="{{ old('name', $service->name) }}" placeholder="Nama layanan" type="text" required>
        <label for="description">Deskripsi</label>
        <textarea name="description" id="description" placeholder="Deskripsi">{{ old('description',$service->description) }}</textarea>
        <label for="price">Harga</label>
        <input name="price" id="price" value="{{ old('price', $service->price) }}" placeholder="Harga" type="number">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
