<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $q = Destination::query()->orderByDesc('created_at');
        if ($search = $request->input('q')) {
            $q->where('title', 'like', "%$search%")->orWhere('excerpt', 'like', "%$search%");
        }
        $destinations = $q->paginate(15)->withQueryString();
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048',
            'price' => 'nullable|integer|min:0',
            'location' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'featured' => 'sometimes',
            'is_active' => 'sometimes',
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('destinations', 'public');
        }

        $data['slug'] = Str::slug($data['title']);
        $data['featured'] = $request->has('featured');
        $data['is_active'] = $request->has('is_active');
        $data['user_id'] = auth()->id();

        // ensure unique slug
        $base = $data['slug']; $i = 1;
        while (Destination::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $base . '-' . $i++;
        }

        Destination::create($data);

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi dibuat');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048',
            'price' => 'nullable|integer|min:0',
            'location' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'featured' => 'sometimes',
            'is_active' => 'sometimes',
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('destinations', 'public');
        }

        $data['featured'] = $request->has('featured');
        $data['is_active'] = $request->has('is_active');

        if (!empty($data['title']) && $data['title'] !== $destination->title) {
            $slug = Str::slug($data['title']); $base = $slug; $i = 1;
            while (Destination::where('slug', $slug)->where('id', '!=', $destination->id)->exists()) {
                $slug = $base . '-' . $i++;
            }
            $data['slug'] = $slug;
        }

        $destination->update($data);

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi diperbarui');
    }

    public function show(Destination $destination)
    {
        return view('admin.destinations.show', compact('destination'));
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return back()->with('success', 'Destinasi dihapus');
    }
}
