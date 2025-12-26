@extends('layouts.admin')

@section('title', 'Edit Paket - Admin')

@section('content')
<div class="container2 admin-tight">
    <h1 class="text-2xl font-bold mb-3">Edit Paket Wisata</h1>

    <form action="{{ route('admin.packages.update', $package) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
        @csrf @method('PUT')
        <label class="block mb-2">Judul
            <input type="text" name="title" value="{{ old('title', $package->title) }}" class="w-full p-2 border rounded" required>
        </label>
        <br>
        <label class="block mb-2">Ringkasan
            <textarea name="excerpt" class="w-full p-2 border rounded" rows="2">{{ old('excerpt', $package->excerpt) }}</textarea>
        </label>
        <br>
        <label class="block mb-2">Deskripsi
            <textarea name="description" class="w-full p-2 border rounded" rows="6">{{ old('description', $package->description) }}</textarea>
        </label>
        <br>
        <label class="block mb-2">Durasi
            <input type="text" name="duration" value="{{ old('duration', $package->duration) }}" class="w-full p-2 border rounded">
        </label>
        <br>
        <label class="block mb-2">Harga
            <input type="number" name="price" value="{{ old('price', $package->price) }}" class="w-full p-2 border rounded">
        </label>
        <br>
        <label class="block mb-2">Gambar Sampul 
            <input id="coverImage" type="file" name="cover_image" class="w-full p-2 border rounded">
            <div style="margin-top:.6rem"><img id="preview" class="preview-img" src="{{ $package->cover_image ? asset('storage/'.$package->cover_image) : 'https://via.placeholder.com/800x300?text=Preview' }}" alt="preview"></div>
        </label>
        <br>
        <div class="flex gap-3 items-center mt-4">
            <label><input type="checkbox" name="featured" {{ $package->featured ? 'checked' : '' }}> Tampilkan sebagai featured</label>
            <label><input type="checkbox" name="is_active" {{ $package->is_active ? 'checked' : '' }}> Aktif</label>
        </div>
        <br>
        <div class="mt-4">
            <button class="px-4 py-2 bg-orange-500 text-white rounded">Perbarui</button>
            <a href="{{ route('admin.packages.index') }}" class="ml-2 text-gray-600">Batal</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('coverImage').addEventListener('change', function(e){
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(ev){ document.getElementById('preview').src = ev.target.result; }
    reader.readAsDataURL(file);
});
</script>
@endpush
