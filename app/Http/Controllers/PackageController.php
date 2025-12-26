<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $query = Package::query()->where('is_active', true)->orderByDesc('featured')->orderByDesc('created_at');

        if ($q = $request->input('q')) {
            $query->where(function($sub) use ($q) {
                $sub->where('title', 'like', "%$q%")
                    ->orWhere('excerpt', 'like', "%$q%")
                    ->orWhere('description', 'like', "%$q%") ;
            });
        }
        if ($duration = $request->input('duration')) {
            if ($duration !== 'all' && !empty($duration)) {
                $query->where('duration', 'like', "%$duration%") ;
            }
        }

        // keep query params when paginating
        $packages = $query->paginate(12)->withQueryString();

        if ($packages->isEmpty()) {
            $dummy = collect([
                (object)[
                    'title' => 'Paket Wisata Bali 3D2N',
                    'excerpt' => 'Liburan seru ke Bali selama 3 hari 2 malam.',
                    'description' => 'Nikmati keindahan Bali dengan paket lengkap hotel dan tour.',
                    'cover_image' => asset('images/bali.jpg'),
                    'duration' => '3 Hari 2 Malam',
                    'price' => 2500000,
                    'slug' => 'paket-wisata-bali-3d2n',
                ],
                (object)[
                    'title' => 'Paket Bromo Midnight',
                    'excerpt' => 'Trip singkat ke Gunung Bromo, start malam.',
                    'description' => 'Paket wisata Bromo dengan sunrise view terbaik.',
                    'cover_image' => asset('images/bromo.jpg'),
                    'duration' => '1 Hari 1 Malam',
                    'price' => 900000,
                    'slug' => 'paket-bromo-midnight',
                ],
            ]);
            $packages = new \Illuminate\Pagination\LengthAwarePaginator($dummy, $dummy->count(), 12, 1);
        }

        return view('packages_index', compact('packages'));
    }

    public function show(Package $package)
    {
        if (!$package->is_active) {
            abort(404);
        }
        return view('packages_show', compact('package'));
    }
}
