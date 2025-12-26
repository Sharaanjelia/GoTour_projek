@extends('layouts.admin')

@section('title','Kelola Destinasi')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Kelola Destinasi</h1>
        <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary">Tambah Destinasi</a>
    </div>
    <table class="w-full bg-white rounded shadow overflow-hidden">
        <thead><tr><th>Title</th><th>Price</th><th>Active</th><th></th></tr></thead>
        <tbody>
            @foreach($destinations as $d)
                <tr class="border-t"><td>{{ $d->title }}</td><td>{{ $d->price }}</td><td>{{ $d->is_active ? 'Yes' : 'No' }}</td><td><a href="{{ route('admin.destinations.edit', $d) }}">Edit</a></td></tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $destinations->links() }}</div>
</div>
@endsection
