<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $q = Destination::where('is_active', true)->orderByDesc('featured')->orderByDesc('created_at');
        if ($s = $request->input('q')) $q->where('title','like',"%$s%");
        $destinations = $q->paginate(12)->withQueryString();
        if ($destinations->isEmpty()) {
            $dummy = collect([
                (object)[
                    'title' => 'Pantai Kuta',
                    'excerpt' => 'Pantai pasir putih terkenal di Bali.',
                    'description' => 'Pantai Kuta adalah salah satu destinasi wisata paling populer di Bali.',
                    'image' => asset('images/kuta.jpg'),
                ],
                (object)[
                    'title' => 'Gunung Bromo',
                    'excerpt' => 'Gunung berapi aktif di Jawa Timur.',
                    'description' => 'Nikmati sunrise terbaik di Indonesia.',
                    'image' => asset('images/bromo.jpg'),
                ],
            ]);
            $destinations = new \Illuminate\Pagination\LengthAwarePaginator($dummy, $dummy->count(), 12, 1);
        }
        return view('destinations_index', compact('destinations'));
    }
}
