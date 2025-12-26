@extends('layouts.admin')

@section('title','Kelola Pembayaran')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Pembayaran</h1>
    <table class="w-full bg-white rounded shadow overflow-hidden">
        <thead><tr><th>User</th><th>Package</th><th>Amount</th><th>Status</th><th></th></tr></thead>
        <tbody>
            @foreach($payments as $p)
                <tr class="border-t"><td>{{ optional($p->user)->name }}</td><td>{{ optional($p->package)->title }}</td><td>{{ $p->amount }}</td><td>{{ $p->status }}</td><td><a href="{{ route('admin.payments.show', $p) }}">Lihat</a></td></tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $payments->links() }}</div>
</div>
@endsection
