@extends('layouts.admin')

@section('title','Kelola Foto')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Kelola Rekomendasi Foto</h1>
        <a href="{{ route('admin.photos.create') }}" class="btn btn-primary">Tambah</a>
    </div>
    <div class="grid grid-cols-3 gap-4">
        @foreach($items as $it)
            <div class="p-2 bg-white border rounded">
                <div class="font-semibold">{{ $it->title }}</div>
                <div class="text-sm text-gray-600">{{ Str::limit($it->description, 80) }}</div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">{{ $items->links() }}</div>
</div>
@endsection
