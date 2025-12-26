<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('name')->get();
        if ($services->isEmpty()) {
            $services = collect([
                (object)[
                    'name' => 'Paket Tour',
                    'description' => 'Layanan paket wisata lengkap dengan guide.',
                ],
                (object)[
                    'name' => 'Sewa Mobil',
                    'description' => 'Sewa kendaraan untuk perjalanan wisata Anda.',
                ],
            ]);
        }
        return view('services_index', compact('services'));
    }
}
