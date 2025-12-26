@extends('layouts.admin')

@section('title','Kelola Promo')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Kelola Promo & Diskon</h1>
        <a href="{{ route('admin.discounts.create') }}" class="btn btn-primary">Tambah</a>
    </div>
    <div class="space-y-2">
        @foreach($items as $it)
            <div class="p-3 bg-white border rounded flex justify-between items-center">
                <div>{{ $it->code }} — {{ $it->percent }}%</div>
                <div><a href="{{ route('admin.discounts.edit', $it) }}">Edit</a></div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">{{ $items->links() }}</div>
</div>
@endsection
