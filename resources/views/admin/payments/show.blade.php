@extends('layouts.admin')

@section('title','Detail Pembayaran')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Pembayaran #{{ $payment->id }}</h1>
    <div class="bg-white p-4 rounded shadow">
        <p><strong>User:</strong> {{ optional($payment->user)->name }}</p>
        <p><strong>Package:</strong> {{ optional($payment->package)->title }}</p>
        <p><strong>Amount:</strong> {{ $payment->amount }}</p>
        <p><strong>Status:</strong> {{ $payment->status }}</p>
    </div>
    <form method="POST" action="{{ route('admin.payments.update', $payment) }}" class="mt-4">
        @csrf
        @method('PUT')
        <select name="status" class="border p-2 rounded">
            <option {{ $payment->status=='pending' ? 'selected':'' }} value="pending">pending</option>
            <option {{ $payment->status=='paid' ? 'selected':'' }} value="paid">paid</option>
            <option {{ $payment->status=='failed' ? 'selected':'' }} value="failed">failed</option>
        </select>
        <button class="ml-2 btn btn-primary">Update</button>
    </form>
</div>
@endsection
