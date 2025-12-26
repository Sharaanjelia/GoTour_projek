<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $items = Testimonial::where('approved', true)->orderByDesc('created_at')->paginate(12);
        if ($items->isEmpty()) {
            $dummy = collect([
                (object)[
                    'name' => 'Andi',
                    'message' => 'Pelayanan sangat memuaskan dan destinasi wisatanya luar biasa!',
                ],
                (object)[
                    'name' => 'Siti',
                    'message' => 'Rekomendasi banget buat liburan keluarga!',
                ],
            ]);
            $items = new \Illuminate\Pagination\LengthAwarePaginator($dummy, $dummy->count(), 12, 1);
        }
        return view('testimonials_index', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'message' => 'required|string',
        ]);

        $data['approved'] = false; // moderation by admin
        if (auth()->check()) $data['user_id'] = auth()->id();
        Testimonial::create($data);

        return back()->with('success', 'Terima kasih — testimoni Anda akan ditinjau.');
    }
}
