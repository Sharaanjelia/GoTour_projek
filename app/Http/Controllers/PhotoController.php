<?php

namespace App\Http\Controllers;

use App\Models\PhotoRecommendation;

class PhotoController extends Controller
{
    public function index()
    {
        $items = PhotoRecommendation::where('is_active', true)->orderByDesc('created_at')->paginate(12);
        if ($items->isEmpty()) {
            $dummy = collect([
                (object)[
                    'title' => 'Pantai Kuta',
                    'description' => 'Foto sunset di Pantai Kuta, Bali.',
                    'image' => asset('images/kuta.jpg'),
                ],
                (object)[
                    'title' => 'Gunung Bromo',
                    'description' => 'Panorama sunrise di Bromo.',
                    'image' => asset('images/bromo.jpg'),
                ],
            ]);
            $items = new \Illuminate\Pagination\LengthAwarePaginator($dummy, $dummy->count(), 12, 1);
        }
        return view('photos_index', compact('items'));
    }
}
