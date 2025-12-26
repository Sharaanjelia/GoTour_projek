@extends('layouts.admin')

@section('title','Kelola Blog')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Kelola Blog</h1>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Tambah Post</a>
    </div>
    <table class="w-full bg-white rounded shadow overflow-hidden">
        <thead><tr><th>Title</th><th>Published</th><th>Active</th><th></th></tr></thead>
        <tbody>
            @foreach($posts as $p)
                <tr class="border-t"><td>{{ $p->title }}</td><td>{{ optional($p->published_at)->format('Y-m-d') }}</td><td>{{ $p->is_active ? 'Yes' : 'No' }}</td><td><a href="{{ route('admin.blog.edit', $p) }}">Edit</a></td></tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $posts->links() }}</div>
</div>
@endsection
