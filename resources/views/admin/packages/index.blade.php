@extends('layouts.admin')

@section('title', 'Kelola Paket - Admin')

@section('content')
<div class="container2 my-8">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h1 class="text-3xl font-bold">Kelola Paket</h1>
            <div class="text-sm text-muted">Kelola paket wisata — tambah, edit, hapus, atau lihat detail.</div>
        </div>
        <div class="flex gap-2 items-center">
            <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">Tambah Paket</a>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr class="text-left text-sm text-gray-600 border-b">
                    <th class="py-2">Judul</th>
                    <th class="py-2">Durasi</th>
                    <th class="py-2">Harga</th>
                    <th class="py-2">Status</th>
                    <th class="py-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($packages as $p)
                <tr class="border-b">
                    <td class="py-3">{{ $p->title }}</td>
                    <td class="py-3">{{ $p->duration }}</td>
                    <td class="py-3">Rp {{ number_format($p->price ?? 0, 0, ',', '.') }}</td>
                    <td class="py-3">{{ $p->is_active ? 'Aktif' : 'Non Aktif' }}</td>
                    <td class="py-3 text-right">
                        <a href="{{ route('admin.packages.show', $p) }}" class="btn btn-ghost">Lihat</a>
                        <a href="{{ route('admin.packages.edit', $p) }}" class="btn">Edit</a>
                        <form action="{{ route('admin.packages.destroy', $p) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus paket ini?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $packages->links() }}</div>
    </div>
</div>
@endsection
