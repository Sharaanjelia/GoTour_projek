@extends('layouts.admin')

@section('title', 'Tambah Paket - Admin')

@section('content')
<div class="container2 my-8">
    <h1 class="text-2xl font-bold mb-4">Tambah Paket Wisata</h1>

    <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data" class="card">
        @csrf

        <label class="block mb-2">Judul
            <input type="text" name="title" class="w-full p-2 border rounded" required>
        </label>

        <label class="block mb-2">Ringkasan
            <textarea name="excerpt" class="w-full p-2 border rounded" rows="2"></textarea>
        </label>

        <label class="block mb-2">Deskripsi
            <textarea name="description" class="w-full p-2 border rounded" rows="6"></textarea>
        </label>

        <label class="block mb-2">Durasi
            <input type="text" name="duration" class="w-full p-2 border rounded">
        </label>

        <label class="block mb-2">Harga
            <input type="number" name="price" class="w-full p-2 border rounded">
        </label>

        <label class="block mb-2">Gambar Sampul
            <input id="coverImage" type="file" name="cover_image" class="w-full p-2 border rounded">
            <div style="margin-top:.6rem"><img id="preview" class="preview-img" src="https://via.placeholder.com/800x300?text=Preview" alt="preview"></div>
        </label>

        <div class="flex gap-3 items-center mt-4">
            <label><input type="checkbox" name="featured"> Tampilkan sebagai featured</label>
            <label><input type="checkbox" name="is_active" checked> Aktif</label>
        </div>

        <div class="mt-4">
            <button class="px-4 py-2 bg-orange-500 text-white rounded">Simpan</button>
            <a href="{{ route('admin.packages.index') }}" class="ml-2 text-gray-600">Batal</a>
        </div>
    </form>

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
</div>
@endsection
