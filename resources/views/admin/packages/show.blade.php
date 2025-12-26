@extends('layouts.admin')

@section('title', 'Detail Paket - Admin')

@section('content')
<div class="package-detail-card">
    <div class="flex items-center justify-between mb-4">
        <h1 class="package-detail-title">Detail Paket</h1>
        <div class="space-x-2">
            <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus paket ini?');">
                @csrf @method('DELETE')
                <button class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>

    <img class="package-detail-img" src="{{ $package->cover_image ? asset('storage/'.$package->cover_image) : 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1200&q=80' }}" alt="{{ $package->title }}">

    <div class="package-detail-info">{{ $package->description }}</div>

    <div class="package-detail-meta">
        <div class="package-detail-meta-row">
            <span class="package-detail-meta-label">Judul</span>
            <span class="package-detail-meta-value">{{ $package->title }}</span>
        </div>
        <div class="package-detail-meta-row">
            <span class="package-detail-meta-label">Slug</span>
            <span class="package-detail-meta-value">{{ $package->slug }}</span>
        </div>
        <div class="package-detail-meta-row">
            <span class="package-detail-meta-label">Durasi</span>
            <span class="package-detail-meta-value">{{ $package->duration }}</span>
        </div>
        <div class="package-detail-meta-row">
            <span class="package-detail-meta-label">Harga</span>
            <span class="package-detail-meta-value">Rp {{ number_format($package->price ?? 0,0,',','.') }}</span>
        </div>
        <div class="package-detail-meta-row">
            <span class="package-detail-meta-label">Status</span>
            <span class="package-detail-meta-value">{{ $package->is_active ? 'Aktif' : 'Non Aktif' }}</span>
        </div>
    </div>
</div>
@endsection
