@extends('layouts.admin')

@section('title','Edit Diskon')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Diskon</h2>
    <form method="POST" action="{{ route('admin.discounts.update', $discount) }}">
        @csrf
        @method('PUT')
        <input name="code" value="{{ old('code', $discount->code) }}" placeholder="Kode" class="w-full mb-2 border p-2 rounded" required>
        <input name="percent" value="{{ old('percent', $discount->percent) }}" placeholder="Persentase" class="w-full mb-2 border p-2 rounded" required>
        <textarea name="description" placeholder="Deskripsi" class="w-full mb-2 border p-2 rounded">{{ old('description', $discount->description) }}</textarea>
        <button class="mt-2 btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
