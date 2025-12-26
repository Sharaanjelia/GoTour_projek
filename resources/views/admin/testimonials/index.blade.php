@extends('layouts.admin')

@section('title','Kelola Testimoni')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Testimoni</h1>
    <div class="space-y-2">
        @foreach($items as $t)
            <div class="p-3 bg-white border rounded">
                <div class="flex justify-between items-center mb-1"><strong>{{ $t->name }}</strong> <span>{{ $t->approved ? 'Approved' : 'Pending' }}</span></div>
                <div class="text-sm text-gray-700">{{ $t->message }}</div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">{{ $items->links() }}</div>
</div>
@endsection
