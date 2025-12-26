@extends('layouts.admin')

@section('title','Kelola Layanan')

@section('content')
<div class="container2">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Kelola Layanan</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Tambah Layanan</a>
    </div>
    <div class="card">
        <table class="user-table">
            <thead>
                <tr>
                    <th>Nama Layanan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $s)
                <tr>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->description }}</td>
                    <td>Rp {{ number_format($s->price ?? 0,0,',','.') }}</td>
                    <td>
                        <div class="user-table-actions">
                            <a href="{{ route('admin.services.edit', $s) }}">Edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $services->links() }}</div>
    </div>
</div>
@endsection
