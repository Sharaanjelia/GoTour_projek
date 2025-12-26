@extends('layouts.admin')

@section('title', 'Kelola Users - Admin')

@section('content')
<div class="container2 my-8">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Kelola Users</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah User</a>
    </div>

    <div class="card">
        <form method="GET" class="user-table-search">
            <input name="q" value="{{ request('q') }}" placeholder="Cari nama / email" type="text" />
            <button type="submit">Cari</button>
            @if(request()->has('q'))
                <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-500 ml-2">Reset</a>
            @endif
        </form>

        <table class="user-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->is_admin ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <div class="user-table-actions">
                            <a href="{{ route('admin.users.edit', $u) }}">Edit</a>
                            <form action="{{ route('admin.users.toggleAdmin', $u) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn-action">{{ $u->is_admin ? 'Revoke Admin' : 'Make Admin' }}</button>
                            </form>
                            @if(auth()->id() !== $u->id)
                            <form action="{{ route('admin.users.destroy', $u) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus user ini?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-danger">Hapus</button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $users->links() }}</div>
    </div>
</div>
@endsection
